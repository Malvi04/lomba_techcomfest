<x-layouts.appcom title="Coming Soon">
    <section class="relative w-full h-screen flex flex-col items-center justify-center font-sans overflow-hidden !pt-0">

        <!-- Background -->
        <img src="{{ Vite::asset('resources/images/comingsoon/bg-guldar.jpg') }}"
             class="absolute inset-0 w-full h-full object-cover z-0">

        <!-- Overlay (harus di atas background, tapi di bawah gear!) -->
        <div class="absolute inset-0 bg-black/40 z-[5]"></div>

        <!-- Gear Left -->
        <img src="{{ Vite::asset('resources/images/comingsoon/unger.png') }}"
             class="absolute bottom-[-50px] left-[-100px] w-[550px] opacity-80 z-[10]">

        <!-- Gear Right -->
        <img src="{{ Vite::asset('resources/images/comingsoon/gear1.png') }}"
             class="absolute top-[-80px] right-[-120px] w-[900px] opacity-80 z-[10]">

        <!-- Content -->
        <div class="relative z-[20] flex flex-col items-center text-center px-6">
            <h1 class="text-6xl md:text-7xl font-bold text-red-600 mb-6 tracking-wide drop-shadow-lg">
                Coming Soon
            </h1>

            <p class="text-white text-xl md:text-3xl font-light mb-12 drop-shadow-lg max-w-2xl">
                Get ready! something really cool is comming!
            </p>

            <a href="/"
               class="bg-[#F1A39D] hover:bg-[#E89885] text-white text-lg md:text-2xl font-semibold px-12 md:px-20 py-3 md:py-4 rounded-md shadow-lg transition-all duration-200">
               Back
            </a>
        </div>
    </section>
</x-layouts.appcom>

