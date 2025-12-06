    <div 
        x-show="contactOpen"
        x-transition.opacity
        x-cloak
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
        @click.self="contactOpen = false"
    >

    {{-- CARD POPUP UTAMA --}}
    <div class="w-[689px] h-[398px] bg-white rounded-[32px] shadow-xl overflow-hidden relative flex ">

        <div class="absolute top-0 right-[-50px] w-[260px] h-full bg-[#F4B6B6] opacity-50 
            rounded-[250px] rotate-[15deg] z-0 pointer-events-none ">
        </div>

        {{-- Tombol Close --}}
        <button 
            @click="contactOpen = false"
            class="absolute right-4 top-4 text-gray-500 hover:text-gray-700 text-xl"
        >✕</button>

        {{-- KIRI --}}
        <div class="w-[300px] bg-[#E47A7A]/40 h-full relative flex flex-col items-center pt-8">

            {{-- Shape background --}}
            <div class="absolute inset-0">
                <div class="absolute w-full h-full bg-[#E47A7A]/40 rounded-[41px]"></div>
            </div>

            {{-- Logo --}}
            <img src="{{ Vite::asset('resources/images/gluco.png') }}" 
                 class="w-16 z-10 mb-6">

            {{-- KONTAK --}}
            <div class="z-10 text-white px-6 space-y-10 text-sm leading-tight">
                <div class="flex items-start gap-8 text-left">
                    <i class="fa-solid fa-location-dot mt-1"></i>
                    <p class="leading-snug">Jalan Margonda Raya No.565,Pondok Cina,Kota Depok,Jawa Barat.</p>
                </div>

                <div class="flex items-start gap-8 text-left">
                    <i class="fa-solid fa-envelope"></i>
                    <p>contact.glucosemail@gmail.com</p>
                </div>

                <div class="flex items-start gap-8 text-left">
                    <i class="fa-solid fa-phone"></i>
                    <p>+62 812-9709-3583</p>
                </div>

            </div>

            {{-- Vertical "CONTACT US" --}}
            <p class="absolute left-6 bottom-25 rotate-[-90deg] origin-left text-white text-3xl font-bold tracking-wide opacity-74">
                Contact Us
            </p>

            {{-- Line --}}
            <div class="absolute right-6 top-1/2 -translate-y-1/2 w-[6px] h-[200px] bg-gradient-to-r from-[#FF5949] to-[#A65353]/30 rounded-full"></div>
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
