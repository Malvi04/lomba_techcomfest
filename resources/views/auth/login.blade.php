<x-layouts.app :title="'Login'">

    <div class="w-full max-w-5xl bg-white rounded-[32px] overflow-hidden shadow-lg grid grid-cols-1 md:grid-cols-2">

        {{-- LEFT SECTION --}}
        <div class="p-10 flex flex-col justify-between bg-gradient-to-b from-[#F37367] to-[#E85346] rounded-[32px]">

            <!-- Logo -->
            <div class="flex mb-8">
                <img src="{{ Vite::asset('resources/images/gluco.png') }}" alt="logo" class="h-16 w-auto">
            </div>

            <!-- Text -->
            <div class="text-white">
                <h1 class="text-3xl font-bold leading-tight">
                    Hidup Sehat?<br>Mulai Dari Sini
                </h1>
                <p class="mt-4 text-lg">
                    Monitor Gula Darahmu<br>Sebelum Terlambat
                </p>
            </div>

        </div>

        {{-- RIGHT SECTION --}}
        <div class="p-14">

            <h2 class="text-3xl font-bold text-gray-800 mb-2">Login</h2>
            <p class="text-gray-600 mb-8">
                Masuk ke akunmu untuk memulai memantau kadar gula darah.
            </p>

            <form method="POST" action="#">
                @csrf

                {{-- Username --}}
                <label class="block text-gray-700 font-semibold mb-1">Username</label>
                <input 
                    type="text" 
                    name="username"
                    class="w-full border border-gray-300 rounded-lg p-3 mb-5 focus:outline-none focus:ring-2 focus:ring-gray-400"
                >

                {{-- Password --}}
                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <div class="relative mb-7">
                    <input 
                        type="password" 
                        name="password"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    >
                    <span class="absolute right-4 top-3.5 text-gray-400 cursor-pointer">
                        
                    </span>
                </div>

                {{-- Button --}}
                <button 
                    type="submit"
                    class="w-full bg-[#333333] text-white font-semibold py-3 rounded-lg shadow-md hover:bg-black transition"
                >
                    Login
                </button>
            </form>

            {{-- Forgot Pass --}}
            <div class="text-center mt-5 text-gray-600">
                <a href="#" class="hover:underline">Lupa password?</a>
            </div>

            <div class="flex items-center my-4">
                <div class="flex-1 border-t"></div>
                <span class="px-4 text-gray-500">atau</span>
                <div class="flex-1 border-t"></div>
            </div>

            {{-- Register --}}
            <div class="text-center text-gray-700">
                Belum punya akun? 
                <a href="#" class="font-semibold hover:underline">Daftar</a>
            </div>

        </div>

    </div>

</x-layouts.app>