<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'GlucoGuide' }}</title>
    <link rel="icon" type="image/png" href="{{ Vite::asset('public/images/GlucoGuide.png') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white">
    <div class="pt-20">
        {{ $slot }}
    </div>
    {{-- Contact Popup --}}
    @include('pages.popup.contact-popup')
</body>
</html>
