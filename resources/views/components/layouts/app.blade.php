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
        @yield('content')
    </div>
    @include('components.popup.contactUs')


    <script>
    document.addEventListener("scroll", revealElements);

    function revealElements() {
        document.querySelectorAll(".reveal-slideRight, .reveal-blur, .reveal-down, .reveal-zoom, .reveal-slideLeft, .reveal-rotate")
        .forEach(el => {
            const rect = el.getBoundingClientRect();
            const showPosition = window.innerHeight * 0.85; // 85% tampilan layar

            if (rect.top < showPosition) {
                el.classList.add("show");
            }
        });
    }
function typeWriterLoop(element, speed = 80, delay = 2000) {
    const text = element.getAttribute("data-text");
    let i = 0;
    let deleting = false;

    function loop() {
            if (!deleting && i <= text.length) {
                // Mengetik
                element.innerHTML = text.substring(0, i);
                i++;
                setTimeout(loop, speed);

            } else if (deleting && i >= 0) {
                // Menghapus
                element.innerHTML = text.substring(0, i);
                i--;
                setTimeout(loop, speed);

            } else {
                // Berhenti 2 detik sebelum ganti mode
                deleting = !deleting;
                setTimeout(loop, delay);
            }
        }

        loop();
    }

    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".typewrite").forEach(el => {
            typeWriterLoop(el);
        });
    });
    </script>


</body>
</html>
