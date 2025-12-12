{{-- CONTAINER DENGAN STATE --}}
<div x-data="{ contactOpen: false, mobileOpen: false }">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full z-50 bg-white/70 backdrop-blur-md shadow-md">

        <div class="flex items-center justify-between px-6 md:px-10 py-6">

            {{-- LEFT: Logo --}}
            <div class="flex items-center flex-none">
                <img src="{{ Vite::asset('resources/images/gluco.png') }}" class="w-16 md:w-20" alt="">
                <span class="text-xl md:text-2xl font-bold text-red-600">GlucoGuide</span>
            </div>

            {{-- CENTER: Desktop Menu --}}
            <ul class="hidden md:flex flex-1 items-center justify-center gap-10 font-medium text-gray-700">

                <li>
                    <a href="/"
                       class="{{ Request::is('/') ? 'text-red-600 underline underline-offset-4 decoration-red-600' :
                       'hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600' }}">
                       Home
                    </a>
                </li>

                <li>
                    <a href="/about"
                       class="{{ Request::is('about') ? 'text-red-600 underline underline-offset-4 decoration-red-600' :
                       'hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600' }}">
                       About
                    </a>
                </li>

                <li>
                    <a href="/services"
                       class="{{ Request::is('services') ? 'text-red-600 underline underline-offset-4 decoration-red-600' :
                       'hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600' }}">
                       Our Services
                    </a>
                </li>

                <li>
                    <button @click="contactOpen = true"
                        class="hover:underline hover:underline-offset-4 hover:decoration-red-600 hover:text-red-600">
                        Contact Us
                    </button>
                </li>

            </ul>

            {{-- RIGHT: Masuk (Desktop) --}}
            <div class="hidden md:block flex-none">
                <a href="/login" class="text-red-600 font-bold hover:text-red-700 text-lg">Masuk</a>
            </div>

            {{-- MOBILE: Hamburger --}}
            <button @click="mobileOpen = !mobileOpen"
                class="md:hidden text-red-600 text-3xl focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

        </div>

        {{-- MOBILE MENU --}}
        <div
            x-show="mobileOpen"
            x-transition
            class="md:hidden bg-white shadow-md px-6 py-4 space-y-4">

            <a href="/"
               class="block {{ Request::is('/') ? 'text-red-600 font-semibold underline decoration-red-600' : 'text-gray-700' }}">
                Home
            </a>

            <a href="/about"
               class="block {{ Request::is('about') ? 'text-red-600 font-semibold underline decoration-red-600' : 'text-gray-700' }}">
                About
            </a>

            <a href="/services"
               class="block {{ Request::is('services') ? 'text-red-600 font-semibold underline decoration-red-600' : 'text-gray-700' }}">
                Our Services
            </a>

            <button @click="contactOpen = true"
                    class="block text-gray-700">
                Contact Us
            </button>

            <a href="/login" class="block text-red-600 font-bold">
                Masuk
            </a>

        </div>
    </nav>

    {{-- POPUP --}}
    @include('components.popup.contactUs')

</div>
