{{-- resources/views/auth/forgot_password.blade.php --}}
<x-layouts.appauth :title="'Forgot Password'">
    <div class="flex items-center justify-center">
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
                <div id="success_dialog" style="display: none;">
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg" id="succ_message">
                        <!-- success message -->
                    </div>
                </div>

                <div id="error_dialog" style="display: none;">
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg" id="err_message">
                        <!-- error message -->
                    </div>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mb-2">Lupa Password?</h2>
                <p class="text-gray-600 mb-8">
                    Masukan email untuk mengirimkan verifikasi kode reset password.
                </p>

                {{-- Email --}}
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input 
                    type="email" 
                    name="email"
                    id="email"
                    class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-300' }} rounded-lg p-3 mb-1 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    autocomplete="email"
                >
                <p id="email-error" class="text-red-600 text-sm mt-1 hidden">
                    Email wajib diisi dan harus valid
                </p>
                <button 
                    type="button"
                    id="request_ver_code-btn"
                    class="w-full bg-[#333333] text-white font-semibold py-3 rounded-lg shadow-md hover:bg-black transition mt-6"
                >
                    Request Verification Code
                </button>

                <div class="mt-6"></div>

                {{-- VERIFICATION + RESET (DISABLED UNTIL REQUEST) --}}
                <div id="ver_code_reset_password" style="display: none;">
                    <label class="block text-gray-700 font-semibold mb-1">Verification Code</label>
                    <input 
                        type="text" 
                        name="ver_code"
                        id="ver_code"
                        class="w-full border {{ $errors->has('ver_code') ? 'border-red-400' : 'border-gray-300' }} rounded-lg p-3 mb-1 focus:outline-none focus:ring-2 focus:ring-gray-400"
                    >
                    <p id="ver_code-error" class="text-red-600 text-sm mt-1 {{ $errors->has('ver_code') ? '' : 'hidden' }}">
                        {{ $errors->has('ver_code') ? $errors->first('ver_code') : 'Verification Code wajib diisi.' }}
                    </p>

                    <label class="block text-gray-700 font-semibold mb-1 mt-4">New Password</label>
                    <div class="relative mb-1">
                        <input 
                            type="password" 
                            name="new_password"
                            id="new_password"
                            class="w-full border {{ $errors->has('new_password') ? 'border-red-400' : 'border-gray-300' }} rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-gray-400"
                        >
                        <span id="toggle_new_password" class="absolute right-4 top-3.5 text-gray-400 cursor-pointer select-none">Show</span>
                    </div>
                    <p id="new_password-error" class="text-red-600 text-sm mt-1 {{ $errors->has('new_password') ? '' : 'hidden' }}">
                        {{ $errors->has('new_password') ? $errors->first('new_password') : 'New Password wajib diisi.' }}
                    </p>

                    <label class="block text-gray-700 font-semibold mb-1 mt-4">Confirm New Password</label>
                    <div class="relative mb-1">
                        <input 
                            type="password" 
                            name="confirm_new_password"
                            id="confirm_new_password"
                            class="w-full border {{ $errors->has('confirm_new_password') ? 'border-red-400' : 'border-gray-300' }} rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-gray-400"
                        >
                        <span id="toggle_confirm_new_password" class="absolute right-4 top-3.5 text-gray-400 cursor-pointer select-none">Show</span>
                    </div>
                    <p id="confirm_new_password-error" class="text-red-600 text-sm mt-1 hidden">
                        Confirm New Password wajib diisi dan harus sama dengan New Password
                    </p>

                    <button 
                        type="button"
                        id="ganti_password-btn"
                        class="w-full bg-[#333333] text-white font-semibold py-3 rounded-lg shadow-md hover:bg-black transition mt-6"
                    >
                        Ganti Password
                    </button>
                </div>

                

                <div class="flex items-center my-4">
                    <div class="flex-1 border-t"></div>
                    <span class="px-4 text-gray-500">atau</span>
                    <div class="flex-1 border-t"></div>
                </div>

                <div class="text-center text-gray-700">
                    Sudah ingat password?
                    <a href="/login" class="font-semibold hover:underline">Login</a>
                </div>
            </div>
        </div>
    </div>
    

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const emailEl = document.getElementById('email');
        const emailErr = document.getElementById('email-error');

        const requestBtn = document.getElementById('request_ver_code-btn');
        const successDialog = document.getElementById('success_dialog');
        const successMsg = document.getElementById('succ_message');
        const errorDialog = document.getElementById('error_dialog');
        const errorMsg = document.getElementById('err_message');

        const verSection = document.getElementById('ver_code_reset_password');
        const verCodeEl = document.getElementById('ver_code');
        const verCodeErr = document.getElementById('ver_code-error');

        const newPassEl = document.getElementById('new_password');
        const newPassErr = document.getElementById('new_password-error');
        const confirmPassEl = document.getElementById('confirm_new_password');
        const confirmPassErr = document.getElementById('confirm_new_password-error');

        const toggleNew = document.getElementById('toggle_new_password');
        const toggleConfirm = document.getElementById('toggle_confirm_new_password');
        const gantiBtn = document.getElementById('ganti_password-btn');

        function hide(el) { if (!el.classList.contains('hidden')) el.classList.add('hidden'); }
        function show(el) { el.classList.remove('hidden'); }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        emailEl.addEventListener('input', () => {
            if (emailEl.value.trim() !== '' && isValidEmail(emailEl.value.trim())) {
                emailErr.classList.add('hidden');
            }
        });

        requestBtn.addEventListener('click', async (ev) => {
            const email = emailEl.value.trim();
            if (email === '' || !isValidEmail(email)) {
                emailErr.classList.remove('hidden');
                return;
            }

            emailEl.classList.add('opacity-60', 'cursor-not-allowed');
            requestBtn.classList.add('opacity-60', 'cursor-not-allowed');
            emailEl.disabled = true;
            requestBtn.disabled = true;

            successDialog.style.display = 'none';
            errorDialog.style.display = 'none';

            ev.preventDefault();

            const res = await (await fetch("/api/rv_forgot_password", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    email: emailEl.value
                })
            })).json();

            if (res["success"]) {
                successMsg.textContent = 'Verification code telah dikirim ke ' + email + '. Cek inbox (atau spam).';
                successDialog.style.display = 'block';

                verSection.style.display = 'block';

                verCodeEl.focus();
            } else {
                errorMsg.textContent = res["message"];
                errorDialog.style.display = 'block';

                emailEl.classList.remove('opacity-60', 'cursor-not-allowed');
                requestBtn.classList.remove('opacity-60', 'cursor-not-allowed');
                emailEl.disabled = false;
                requestBtn.disabled = false;
            }
        });

        toggleNew.addEventListener('click', () => {
            if (newPassEl.type === 'password') {
                newPassEl.type = 'text';
                toggleNew.textContent = 'Hide';
            } else {
                newPassEl.type = 'password';
                toggleNew.textContent = 'Show';
            }
        });

        toggleConfirm.addEventListener('click', () => {
            if (confirmPassEl.type === 'password') {
                confirmPassEl.type = 'text';
                toggleConfirm.textContent = 'Hide';
            } else {
                confirmPassEl.type = 'password';
                toggleConfirm.textContent = 'Show';
            }
        });

        verCodeEl.addEventListener('input', () => {
            verCodeErr.classList.add('hidden');
        });
        newPassEl.addEventListener('input', () => {
            newPassErr.classList.add('hidden');
            confirmPassErr.classList.add('hidden');
        });
        confirmPassEl.addEventListener('input', () => {
            confirmPassErr.classList.add('hidden');
        });

        gantiBtn.addEventListener('click', async (ev) => {
            ev.preventDefault();
            successDialog.style.display = 'none';
            errorDialog.style.display = 'none';

            let valid = true;

            // ver code required
            if (verCodeEl.value.trim() === '') {
                verCodeErr.classList.remove('hidden');
                valid = false;
            }

            // new password required (and whatever rules you want)
            if (newPassEl.value.trim() === '') {
                newPassErr.classList.remove('hidden');
                valid = false;
            } else if (newPassEl.value.trim().length < 6) {
                newPassErr.textContent = 'Password minimal 6 karakter.';
                newPassErr.classList.remove('hidden');
                valid = false;
            }

            // confirm match
            if (confirmPassEl.value.trim() === '') {
                confirmPassErr.textContent = 'Confirm New Password wajib diisi';
                confirmPassErr.classList.remove('hidden');
                valid = false;
            } else if (confirmPassEl.value !== newPassEl.value) {
                confirmPassErr.textContent = 'Confirm New Password tidak cocok';
                confirmPassErr.classList.remove('hidden');
                valid = false;
            }
            if (!valid) return;

            const res = await (await fetch("/api/forgot_password", {
                "method": "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                }, body: new URLSearchParams({
                    email: emailEl.value,
                    ver_code: verCodeEl.value,
                    new_pass: newPassEl.value,
                    new_pass_confirmation: confirmPassEl.value
                }).toString()
            })).json()

            
            if (res["success"]) {
                window.location.href = res.redirect + '?success=' + encodeURIComponent(res.message);
            } else {
                errorMsg.textContent = res["message"];
                errorDialog.style.display = 'block';
            }
        });
    });
    </script>

</x-layouts.appauth>