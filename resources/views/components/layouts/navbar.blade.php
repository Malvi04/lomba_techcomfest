 {{-- NAVBAR --}}
<nav x-data="{ contactOpen: false }" class="fixed top-0 left-0 w-full z-50 bg-white/70 backdrop-blur-md shadow-md">
    <div class="w-full flex items-center justify-between px-10 py-6 bg-transparent">
        {{-- LEFT: Logo --}}
        <div class="flex items-center flex-none">
            <img src="{{ Vite::asset('resources/images/gluco.png') }}" class="w-20" alt="">
            <span class="text-2xl font-bold text-red-600">GlucoGuide</span>
        </div>

        {{-- CENTER: Menu --}}
        <ul class="flex-1 flex items-center justify-center gap-10 font-medium text-gray-700">
            <li><a href="/" class="hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600">Home</a></li>
            <li><a href="/about" class="hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600">About</a></li>
            <li><a href="/services" class="hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600">Our Services</a></li>
            <li><button @click="contactOpen = true" type="button" class="hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600">Contact Us</button></li>
        </ul>

        {{-- RIGHT: Masuk --}}
        <div class="flex-none">
            <a href="/login" class="text-red-600 font-bold hover:text-red-700 text-lg">Masuk</a>
        </div>
    </div>
</nav>