<?php

$srcPath = dirname(__DIR__) . '/public/chance-laptops-logo.png';
$public = dirname(__DIR__) . '/public';

$src = @imagecreatefrompng($srcPath) ?: imagecreatefromjpeg($srcPath);
if (! $src) {
    fwrite(STDERR, "Could not read logo PNG\n");
    exit(1);
}

$w = imagesx($src);
$h = imagesy($src);

$trim = 245;
$minX = $w;
$minY = $h;
$maxX = 0;
$maxY = 0;

for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        if ($r < $trim || $g < $trim || $b < $trim) {
            if ($x < $minX) {
                $minX = $x;
            }
            if ($y < $minY) {
                $minY = $y;
            }
            if ($x > $maxX) {
                $maxX = $x;
            }
            if ($y > $maxY) {
                $maxY = $y;
            }
        }
    }
}

if ($maxX < $minX) {
    $minX = 0;
    $minY = 0;
    $maxX = $w - 1;
    $maxY = $h - 1;
}

$pad = 4;
$minX = max(0, $minX - $pad);
$minY = max(0, $minY - $pad);
$maxX = min($w - 1, $maxX + $pad);
$maxY = min($h - 1, $maxY + $pad);

$cw = $maxX - $minX + 1;
$ch = $maxY - $minY + 1;
$side = max($cw, $ch);
$cropped = imagecreatetruecolor($side, $side);
$white = imagecolorallocate($cropped, 255, 255, 255);
imagefill($cropped, 0, 0, $white);
imagecopy($cropped, $src, (int) (($side - $cw) / 2), (int) (($side - $ch) / 2), $minX, $minY, $cw, $ch);
imagedestroy($src);

function savePng($im, $size, $path): void
{
    $out = imagecreatetruecolor($size, $size);
    $white = imagecolorallocate($out, 255, 255, 255);
    imagefill($out, 0, 0, $white);
    imagecopyresampled($out, $im, 0, 0, 0, 0, $size, $size, imagesx($im), imagesy($im));
    imagepng($out, $path, 6);
    imagedestroy($out);
}

savePng($cropped, 48, $public . '/favicon.png');
savePng($cropped, 180, $public . '/apple-touch-icon.png');
savePng($cropped, 192, $public . '/favicon-192.png');

$ico32 = imagecreatetruecolor(32, 32);
$white = imagecolorallocate($ico32, 255, 255, 255);
imagefill($ico32, 0, 0, $white);
imagecopyresampled($ico32, $cropped, 0, 0, 0, 0, 32, 32, $side, $side);
writeIco($ico32, $public . '/favicon.ico');
imagedestroy($ico32);
imagedestroy($cropped);

echo "Wrote favicon.png, favicon.ico, apple-touch-icon.png, favicon-192.png\n";

function writeIco($im, $path): void
{
    $w = imagesx($im);
    $h = imagesy($im);
    $pixels = '';
    $andMask = '';
    $rowPad = (4 - (($w * 3) % 4)) % 4;
    $maskPad = (4 - (int) (ceil($w / 8)) % 4) % 4;

    for ($y = $h - 1; $y >= 0; $y--) {
        $maskByte = 0;
        $maskBit = 7;
        $maskRow = '';
        for ($x = 0; $x < $w; $x++) {
            $rgb = imagecolorat($im, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $pixels .= chr($b) . chr($g) . chr($r);
            $maskByte |= (0 << $maskBit);
            $maskBit--;
            if ($maskBit < 0) {
                $maskRow .= chr($maskByte);
                $maskByte = 0;
                $maskBit = 7;
            }
        }
        if ($maskBit !== 7) {
            $maskRow .= chr($maskByte);
        }
        $pixels .= str_repeat("\0", $rowPad);
        $andMask .= $maskRow . str_repeat("\0", $maskPad);
    }

    $xorSize = strlen($pixels);
    $andSize = strlen($andMask);
    $dibSize = 40 + $xorSize + $andSize;

    $ico = pack('vvv', 0, 1, 1);
    $ico .= pack('CCCCvvVV', $w >= 256 ? 0 : $w, $h >= 256 ? 0 : $h, 0, 0, 1, 24, $dibSize, 22);
    $ico .= pack('VVVvvVVVVVV', 40, $w, $h * 2, 1, 24, 0, $xorSize + $andSize, 0, 0, 0, 0);
    $ico .= $pixels . $andMask;

    file_put_contents($path, $ico);
}
