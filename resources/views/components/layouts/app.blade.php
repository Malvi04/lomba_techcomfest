<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'GlucoGuide' }}</title>
    <link rel="icon" type="image/png" href="{{ Vite::asset('public/images/GlucoGuide.png') }}">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
    [x-cloak] { display: none !important; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    x-data="{ show: false, leaving: false }"
    x-init="show = true"
    :class="{
        'opacity-0': !show || leaving,
        'opacity-100': show && !leaving
    }"
    class="antialiased bg-white transition-opacity duration-300"
    x-cloak
>

    <div class="{{ $noPadding ?? false ? '' : 'pt-20' }}">
        {{ $slot }}
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

    <script>
        function sleepTracker() {
            return {
                hour: 22,
                minute: 0,
                history: [],

                saveSleepTime() {
                    const time = `${String(this.hour).padStart(2,'0')}:${String(this.minute).padStart(2,'0')}`;

                    this.history.push({
                        day: "Senin",
                        sleep: time
                    });

                    console.log("Saved:", time);
                }
            }
        }
    </script>

</body>
</html>
