<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quotation {{ $quotation_number }}</title>
    <style>
        @page { size: A4 portrait; margin: 10mm; }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            background: #ffffff;
        }
    </style>
</head>
<body>
@include('quotations.document')
</body>
</html>
