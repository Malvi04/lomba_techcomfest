<div 
    x-data="{ open: true }"
    x-show="contactOpen"
    x-transition.opacity
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
>

    {{-- CARD POPUP UTAMA --}}
    <div class="w-[689px] h-[398px] bg-white rounded-[32px] shadow-xl overflow-hidden relative flex">

        {{-- Tombol Close --}}
        <button 
            @click="contactOpen = false"
            class="absolute right-4 top-4 text-gray-500 hover:text-gray-700 text-xl"
        >✕</button>

        {{-- KIRI --}}
        <div class="w-[260px] bg-[#E47A7A]/40 h-full relative flex flex-col items-center pt-8">

            {{-- Shape background --}}
            <div class="absolute inset-0">
                <div class="absolute w-full h-full bg-[#E47A7A]/40 rounded-[32px]"></div>
            </div>

            {{-- Logo --}}
            <img src="{{ Vite::asset('resources/images/gluco.png') }}" 
                 class="w-16 z-10 mb-6">

            {{-- KONTAK --}}
            <div class="z-10 text-white px-6 space-y-4 text-sm leading-tight">

                <div class="flex items-start gap-3">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Jalan Mergenda Raya No. 565, Panada Citra Depak,<br>Jawa Barat.</p>
                </div>

                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-envelope"></i>
                    <p>contact.glucosemail@gmail.com</p>
                </div>

                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-phone"></i>
                    <p>+62 08080 808080</p>
                </div>

            </div>

            {{-- Vertical "CONTACT US" --}}
            <p class="absolute left-0 bottom-8 rotate-[-90deg] origin-left text-white text-2xl font-bold tracking-wide">
                Contact Us
            </p>

            {{-- Line --}}
            <div class="absolute right-6 top-1/2 -translate-y-1/2 w-[4px] h-[150px] bg-[#E34141] rounded-full"></div>
        </div>

        {{-- KANAN - FORM --}}
        <div class="flex-1 p-10">

            <h2 class="text-2xl font-bold text-[#2B2B2B]">Get in touch</h2>
            <p class="text-gray-600 text-sm mt-1">Silakan tinggalkan pesan di bawah.</p>

            {{-- FORM --}}
            <div class="mt-6 space-y-3">

                <input type="text" placeholder="Masukkan Nama"
                       class="w-full bg-[#E6E6E6] rounded-md py-2 px-3 focus:outline-none">

                <input type="email" placeholder="Masukkan Email"
                       class="w-full bg-[#E6E6E6] rounded-md py-2 px-3 focus:outline-none">

                <textarea placeholder="Tulis Pesan ..."
                          class="w-full h-[150px] bg-[#E6E6E6] rounded-md p-3 focus:outline-none"></textarea>

            </div>

        </div>

    </div>
</div>
