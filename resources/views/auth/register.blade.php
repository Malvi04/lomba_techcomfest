<x-layouts.app :title="'Register'">

    <div class="w-full min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-5xl bg-white rounded-[32px] overflow-hidden shadow-lg grid grid-cols-1 md:grid-cols-2 min-h-[650px]">

            <!-- LEFT: Form -->
            <div class="p-14">
                <h1 class="text-3xl font-bold text-gray-800">Create an account</h1>
                <p class="mt-2 text-gray-500">Mulai sehat dari sini</p>

                <form method="POST" action="#" class="mt-8 space-y-6">
                    @csrf

                    <!-- Username + Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-semibold text-gray-700">Username</label>
                            <input type="text" name="username"
                                class="mt-1 w-full border border-gray-300 rounded-lg h-12 px-4 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700">Email</label>
                            <input type="email" name="email"
                                class="mt-1 w-full border border-gray-300 rounded-lg h-12 px-4 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative">
                            <input type="password" name="password"
                                class="mt-1 w-full border border-gray-300 rounded-lg h-12 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <button type="button" class="absolute right-3 top-3 text-gray-400" aria-label="toggle password">👁️</button>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation"
                                class="mt-1 w-full border border-gray-300 rounded-lg h-12 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <button type="button" class="absolute right-3 top-3 text-gray-400" aria-label="toggle confirm password">👁️</button>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                        class="w-full bg-gray-800 hover:bg-gray-900 text-white font-semibold h-12 rounded-lg shadow-md">
                        Register
                    </button>

                    <!-- Divider -->
                    <div class="flex items-center gap-4">
                        <div class="flex-1 h-px bg-gray-300"></div>
                        <p class="text-gray-500">atau</p>
                        <div class="flex-1 h-px bg-gray-300"></div>
                    </div>

                    <!-- Google Button -->
                    <button type="button"
                        class="w-full flex items-center justify-center gap-3 bg-gray-200 hover:bg-gray-300 text-gray-700 h-12 rounded-lg shadow">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-6" alt="Google"> Google
                    </button>
                </form>
            </div>

            <!-- RIGHT: Gradient banner (rapi, radius & shadow) -->
            <div class="relative p-10 bg-gradient-to-b from-[#FF9E8A] to-[#FF6A55] md:rounded-r-[32px] md:rounded-tl-[32px] rounded-b-[32px] shadow-2xl ring-1 ring-black/5 overflow-hidden flex flex-col justify-end">

                <!-- Logo (top-left, absolute) -->
                <img src="{{ Vite::asset('resources/images/gluco.png') }}" alt="logo"
                     class="absolute top-8 left-8 w-16 h-auto z-10">


                <!-- Text content (bottom-left) -->
                <div class="text-white px-8 pb-8">
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                        Hidup Sehat?<br>Mulai Dari Sini
                    </h1>
                    <p class="mt-4 text-lg md:text-xl font-semibold max-w-xs">
                        Monitor Gula Darahmu<br>Sebelum Terlambat
                    </p>
                </div>

            </div>

        </div>
    </div>

</x-layouts.app>