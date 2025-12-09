<x-layouts.app title="Coming Soon">
    <!-- COMING SOON PAGE -->
    <section class="relative w-full h-screen flex flex-col items-center justify-center font-sans overflow-hidden">
        <!-- Background Image -->
        <img src="{{ Vite::asset('resources/images/comingsoon/bg-comingsoon.png') }}" class="absolute inset-0 w-full h-full object-cover opacity-40" />

        <!-- Big Gear Left -->
        <img src="{{ Vite::asset('resources/images/comingsoon/gear-left.png') }}" class="absolute bottom-[-60px] left-[-60px] w-[350px] opacity-70" />

        <!-- Big Gear Right -->
        <img src="{{ Vite::asset('resources/images/comingsoon/gear-right.png') }}" class="absolute top-[-80px] right-[-80px] w-[500px] opacity-70" />

        <!-- MAIN TEXT -->
        <h1 class="text-6xl font-bold text-red-600 drop-shadow-lg mb-6">Coming Soon</h1>

        <p class="text-white text-2xl font-light drop-shadow mb-10">Get ready! something really cool is comming!</p>

        <!-- BUTTON -->
        <a href="/" class="bg-[#EFA8A4] text-white text-2xl font-semibold px-16 py-3 rounded-md shadow-md hover:opacity-90 transition-all duration-200">Back</a>
    </section>
</x-layouts.app>