<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        if (HeroSlide::exists()) {
            $this->command?->info('Hero slides already exist — skipping seed.');
            return;
        }

        Storage::disk('public')->makeDirectory('hero-slides');

        $files = collect(File::files(public_path('images/sliders')))
            ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif']))
            ->sortBy(fn ($file) => $file->getFilename())
            ->values();

        $links = [
            '/promotions',
            '/categories',
            '/services',
            '/about-us',
            '/contact-us',
            '/wholesale',
        ];

        foreach ($files as $index => $file) {
            $filename = 'hero-slides/' . uniqid('slide_', true) . '.' . strtolower($file->getExtension());
            Storage::disk('public')->put($filename, File::get($file->getPathname()));

            HeroSlide::create([
                'title' => 'Homepage slide ' . ($index + 1),
                'image_path' => $filename,
                'link_url' => $links[$index] ?? null,
                'alt_text' => 'Chance Laptops slide ' . ($index + 1),
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }

        $this->command?->info('Seeded ' . $files->count() . ' hero slides from public/images/sliders.');
    }
}
