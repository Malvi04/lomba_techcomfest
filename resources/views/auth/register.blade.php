{{-- resources/views/auth/register.blade.php --}}
<x-layouts.appauth :title="'Register'">

    <div class="w-full min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-5xl bg-white rounded-[32px] overflow-hidden shadow-lg grid grid-cols-1 md:grid-cols-2 min-h-[650px]">

            <!-- LEFT: Form -->
            <div class="p-14">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <h1 class="text-3xl font-bold text-gray-800">Create an account</h1>
                <p class="mt-2 text-gray-500">Mulai sehat dari sini</p>

                {{-- server validation summary --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-50 text-red-700 rounded">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/register" class="mt-8 space-y-6" novalidate>
                    @csrf

                    <!-- Username + Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="username" class="text-sm font-semibold text-gray-700">Username</label>
                            <input id="username" type="text" name="username" value="{{ old('username') }}"
                                class="mt-1 w-full border {{ $errors->has('username') ? 'border-red-400' : 'border-gray-300' }} rounded-lg h-12 px-4 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>

                        <div>
                            <label for="email" class="text-sm font-semibold text-gray-700">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="mt-1 w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-300' }} rounded-lg h-12 px-4 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>
                    </div>

                    <p id="username-error" class="text-red-600 text-sm mt-1 {{ $errors->has('username') ? '' : 'hidden' }}">
                        {{ $errors->has('username') ? $errors->first('username') : 'Username wajib diisi.' }}
                    </p>
                    <p id="email-error" class="text-red-600 text-sm mt-1 {{ $errors->has('email') ? '' : 'hidden' }}">
                        {{ $errors->has('email') ? $errors->first('email') : 'Email wajib diisi.' }}
                    </p>

                    <!-- Full Name -->
                    <div>
                        <label for="full_name" class="text-sm font-semibold text-gray-700">Full Name</label>
                        <div class="relative">
                            <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}"
                                class="mt-1 w-full border {{ $errors->has('full_name') ? 'border-red-400' : 'border-gray-300' }} rounded-lg h-12 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        </div>
                    </div>

                    <p id="full-name-error" class="text-red-600 text-sm mt-1 {{ $errors->has('full_name') ? '' : 'hidden' }}">
                        {{ $errors->has('full_name') ? $errors->first('full_name') : 'Full Name wajib diisi.' }}
                    </p>

                    <!-- Password -->
                    <div>
                        <label for="password" class="text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative">
                            <input id="password" type="password" name="password"
                                class="mt-1 w-full border {{ $errors->has('password') ? 'border-red-400' : 'border-gray-300' }} rounded-lg h-12 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <button id="toggle-password" type="button" class="absolute right-4 top-4 text-gray-400 cursor-pointer select-none" aria-label="toggle password">Show</button>
                        </div>
                    </div>

                    <p id="password-error" class="text-red-600 text-sm mt-1 {{ $errors->has('password') ? '' : 'hidden' }}">
                        {{ $errors->has('password') ? $errors->first('password') : 'Password wajib diisi.' }}
                    </p>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="text-sm font-semibold text-gray-700">Confirm Password</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="mt-1 w-full border {{ $errors->has('password_confirmation') ? 'border-red-400' : 'border-gray-300' }} rounded-lg h-12 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <button id="toggle-confirm-password" type="button" class="absolute right-4 top-4 text-gray-400 cursor-pointer select-none" aria-label="toggle confirm password">Show</button>
                        </div>
                    </div>

                    <p id="confirm-password-error" class="text-red-600 text-sm mt-1 {{ $errors->has('password_confirmation') ? '' : 'hidden' }}">
                        {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : 'Confirm Password wajib diisi.' }}
                    </p>

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

            <div class="relative p-10 bg-gradient-to-b from-[#FF9E8A] to-[#FF6A55] md:rounded-r-[32px] md:rounded-tl-[32px] rounded-b-[32px] shadow-2xl ring-1 ring-black/5 overflow-hidden flex flex-col justify-end">

                <img src="{{ Vite::asset('resources/images/gluco.png') }}" alt="logo"
                     class="absolute top-8 left-8 w-16 h-auto z-10">

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

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');

        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const fullName = document.getElementById('full_name');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');

        const usernameErr = document.getElementById('username-error');
        const emailErr = document.getElementById('email-error');
        const fullNameErr = document.getElementById('full-name-error');
        const passwordErr = document.getElementById('password-error');
        const confirmPasswordErr = document.getElementById('confirm-password-error');

        const togglePwd = document.getElementById('toggle-password');
        const toggleConfirmPwd = document.getElementById('toggle-confirm-password');

        const hide = el => el && el.classList.add('hidden');
        const show = el => el && el.classList.remove('hidden');

        togglePwd && togglePwd.addEventListener('click', () => {
            if (password.type === 'password') { password.type = 'text'; togglePwd.textContent = 'Hide'; }
            else { password.type = 'password'; togglePwd.textContent = 'Show'; }
        });

        toggleConfirmPwd && toggleConfirmPwd.addEventListener('click', () => {
            if (passwordConfirm.type === 'password') { passwordConfirm.type = 'text'; toggleConfirmPwd.textContent = 'Hide'; }
            else { passwordConfirm.type = 'password'; toggleConfirmPwd.textContent = 'Show'; }
        });

        username && username.addEventListener('input', () => { if (username.value.trim() !== '') hide(usernameErr); });
        email && email.addEventListener('input', () => { if (email.value.trim() !== '') hide(emailErr); });
        fullName && fullName.addEventListener('input', () => { if (fullName.value.trim() !== '') hide(fullNameErr); });
        password && password.addEventListener('input', () => { if (password.value.trim() !== '') hide(passwordErr); });
        passwordConfirm && passwordConfirm.addEventListener('input', () => { if (passwordConfirm.value.trim() !== '') hide(confirmPasswordErr); });

        form && form.addEventListener('submit', (e) => {
            let valid = true;

            hide(usernameErr); hide(emailErr); hide(fullNameErr); hide(passwordErr); hide(confirmPasswordErr);

            if (!username || username.value.trim() === '') {
                show(usernameErr);
                valid = false;
            }
            if (!email || email.value.trim() === '') {
                show(emailErr);
                valid = false;
            }
            if (!fullName || fullName.value.trim() === '') {
                show(fullNameErr);
                valid = false;
            }
            if (!password || password.value.trim() === '') {
                show(passwordErr);
                valid = false;
            }
            if (!passwordConfirm || passwordConfirm.value.trim() === '') { 
                show(confirmPasswordErr);
                valid = false; 
            }

            if (password.value.length < 8 || passwordConfirm.value.length < 8) {
                confirmPasswordErr.textContent = 'Password harus mencapai 8 karakter';
                show(confirmPasswordErr);
                valid = false;
            }
            if (password && passwordConfirm && password.value.trim() !== '' && passwordConfirm.value.trim() !== '' && password.value !== passwordConfirm.value) {
                confirmPasswordErr.textContent = 'Password dan konfirmasi tidak cocok.';
                show(confirmPasswordErr);
                valid = false;
            }

            if (!valid) e.preventDefault();
        });
    });
    </script>

</x-layouts.app>
