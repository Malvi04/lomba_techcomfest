<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'GlucoGuide' }}</title>
    <link rel="icon" type="image/png" href="{{ Vite::asset('public/images/GlucoGuide.png') }}">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
    [x-cloak] { display: none !important; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white">
    <div class="pt-20">
        {{ $slot }}
    </div>
    @include('components.popup.contactUs')

</body>
</html>
