{{-- resources/views/auth/login.blade.php --}}
<x-layouts.app :title="'Login'">
    <div class="w-full max-w-5xl bg-white rounded-[32px] overflow-hidden shadow-lg grid grid-cols-1 md:grid-cols-2">
        {{-- LEFT --}}
        <div class="p-10 flex flex-col justify-between bg-gradient-to-b from-[#F37367] to-[#E85346] rounded-[32px]">
            <div class="flex mb-8">
                <img src="{{ Vite::asset('resources/images/gluco.png') }}" alt="logo" class="h-16 w-auto">
            </div>

            <div class="text-white">
                <h1 class="text-3xl font-bold leading-tight">
                    Hidup Sehat?<br>Mulai Dari Sini
                </h1>
                <p class="mt-4 text-lg">
                    Monitor Gula Darahmu<br>Sebelum Terlambat
                </p>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="p-14">
            @if(request()->query('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ request()->query('success') }}</div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <h2 class="text-3xl font-bold text-gray-800 mb-2">Login</h2>
            <p class="text-gray-600 mb-8">
                Masuk ke akunmu untuk memulai memantau kadar gula darah.
            </p>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 text-red-700 rounded">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- form posts to /login --}}
            <form method="POST" action="{{ url('/login') }}" novalidate>
                @csrf

                {{-- Username --}}
                <label class="block text-gray-700 font-semibold mb-1">Username or Email</label>
                <input 
                    type="text" 
                    name="uoe"
                    id="uoe"
                    value="{{ old('uoe') }}"
                    autocomplete="uoe"
                    class="w-full border {{ $errors->has('uoe') ? 'border-red-400' : 'border-gray-300' }} rounded-lg p-3 mb-1 focus:outline-none focus:ring-2 focus:ring-gray-400"
                >
                <p id="uoe-error" class="text-red-600 text-sm mt-1 {{ $errors->has('uoe') ? '' : 'hidden' }}">
                    {{ $errors->has('uoe') ? $errors->first('uoe') : 'Username or Password wajib diisi.' }}
                </p>

                {{-- Password --}}
                <label class="block text-gray-700 font-semibold mb-1 mt-4">Password</label>
                <div class="relative mb-1">
                    <input 
                        type="password" 
                        name="password"
                        id="password"
                        autocomplete="current-password"
                        class="w-full border {{ $errors->has('password') ? 'border-red-400' : 'border-gray-300' }} rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    >
                    <span id="toggle-password" class="absolute right-4 top-3.5 text-gray-400 cursor-pointer select-none">Show</span>
                </div>
                <p id="password-error" class="text-red-600 text-sm mt-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                    {{ $errors->has('password') ? $errors->first('password') : 'Password wajib diisi.' }}
                </p>

                <button 
                    type="submit"
                    id="login-btn"
                    class="w-full bg-[#333333] text-white font-semibold py-3 rounded-lg shadow-md hover:bg-black transition mt-6"
                >
                    Login
                </button>
            </form>

            <div class="text-center mt-5 text-gray-600">
                <a href="/forgot_password" class="hover:underline">Lupa password?</a>
            </div>

            <div class="flex items-center my-4">
                <div class="flex-1 border-t"></div>
                <span class="px-4 text-gray-500">atau</span>
                <div class="flex-1 border-t"></div>
            </div>

            <div class="text-center text-gray-700">
                Belum punya akun? 
                <a href="/register" class="font-semibold hover:underline">Daftar</a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');
        const u = document.getElementById('uoe');
        const up = document.getElementById('uoe-error');
        const p = document.getElementById('password');
        const pp = document.getElementById('password-error');
        const toggle = document.getElementById('toggle-password');

        toggle.addEventListener('click', () => {
            if (p.type === 'password') { 
                p.type = 'text'; 
                toggle.textContent = 'Hide'; 
            } else { 
                p.type = 'password'; 
                toggle.textContent = 'Show'; 
            }
        });

        u.addEventListener('input', () => {
            if (u.value.trim() !== '') {
                up.classList.add('hidden');
            }
        });

        p.addEventListener('input', () => {
            if (p.value.trim() !== '') {
                pp.classList.add('hidden');
            }
        });

        form.addEventListener('submit', (e) => {
            let valid = true;

            up.classList.add('hidden');
            pp.classList.add('hidden');

            if (u.value.trim() === '') {
                up.classList.remove('hidden');
                valid = false;
            }

            if (p.value.trim() === '') {
                pp.classList.remove('hidden');
                valid = false;
            }

            if (!valid) e.preventDefault();
        });
    });
    </script>

</x-layouts.app>
