<div
    x-show="contactOpen"
    x-transition.opacity
    x-cloak
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    @click.self="contactOpen = false"
>
    <!-- CARD -->
    <div class="relative w-[800px] h-[450px] bg-white rounded-[32px] overflow-hidden shadow-2xl">

        <!-- ================= BACKGROUND SHAPES ================= -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            
            <div
                class="absolute
                left-[60px] top-[-140px]
                w-[260px] h-[700px]
                bg-[#F6D2D2]
                rotate-[140deg]
                rounded-[30px]
                opacity-70">
            </div>
            <div
                class="absolute
                left-[110px] top-[-140px]
                w-[260px] h-[700px]
                bg-[#F6D2D2]
                rotate-[18deg]
                rounded-[260px]
                opacity-70">
            </div>
            <!-- SHAPE KIRI BESAR (OVAL UTAMA) -->
            <div
                class="absolute
                left-[-120px] top-[-40px]
                w-[420px] h-[520px]
                bg-[#EFA2A2]
                rounded-[260px]">
            </div>

            <!-- SHAPE DIAGONAL SILANG -->

        </div>
        <!-- ===================================================== -->

        <!-- ================= CONTENT ================= -->
        <div class="relative z-10 flex h-full">

            <!-- LEFT PANEL -->
            <div class="relative w-[260px] h-full flex flex-col items-center pt-8 text-white">

                <!-- Logo -->
                <img
                    src="{{ Vite::asset('resources/images/gluco.png') }}"
                    class="w-20 mb-6"
                >

                <!-- CONTACT LIST -->
                <div class="mt-6 space-y-6 text-sm px-6 translate-x-5">

                    <div class="flex gap-3 items-start">
                        <img src="{{ Vite::asset('resources/images/icons/locate.png') }}" class="w-5 mt-1">
                        <p class="leading-snug">
                            Jalan Margonda Raya No.565,<br>
                            Pondok Cina, Kota Depok,<br>
                            Jawa Barat.
                        </p>
                    </div>

                    <div class="flex gap-3 items-center">
                        <img src="{{ Vite::asset('resources/images/icons/mail.png') }}" class="w-5">
                        <p>contact.glucosemail@gmail.com</p>
                    </div>

                    <div class="flex gap-3 items-center">
                        <img src="{{ Vite::asset('resources/images/icons/phone.png') }}" class="w-5">
                        <p>+62 812-9709-3583</p>
                    </div>

                </div>

                <!-- TEXT VERTICAL -->
                <div class="absolute left-[-70px] bottom-[235px] rotate-[-90deg]">
                    <p class="text-3xl font-bold tracking-widest tracking-wide opacity-100">
                        Contact Us
                    </p>
                </div>

                <!-- GARIS MERAH -->
                <div
                    class="absolute right-4 top-1/2 -translate-y-1/2 translate-x-10
                    w-[6px] h-[160px]
                    bg-gradient-to-b from-[#FF5949] to-[#B65A5A]/40
                    rounded-full">
                </div>

            </div>

            <!-- RIGHT FORM -->
            <div class="flex-1 pl-20 pr-10 py-10">

                <!-- Close -->
                <button
                    @click="contactOpen = false"
                    class="absolute top-5 right-6 text-gray-400 hover:text-gray-700 text-xl"
                >
                    ✕
                </button>

                <h2 class="text-3xl font-bold text-[#2B2B2B] translate-x-10">
                    Get in touch
                </h2>
                <p class="text-black mt-1 translate-x-10">
                    Silakan tinggalkan pesan di bawah.
                </p>

                <form action="{{ route('contact.send') }}" method="POST" class="mt-6 space-y-4">
                    @csrf

                    <input
                        type="text"
                        name="name"
                        placeholder="Masukkan Nama"
                        class="w-full bg-[#E6E6E6] rounded-lg px-4 py-3 outline-none placeholder-gray-500"
                    >

                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan Email"
                        class="w-full bg-[#E6E6E6] rounded-lg px-4 py-3 outline-none placeholder-gray-500"
                    >

                    <textarea
                        name="message"
                        placeholder="Tulis Pesan ..."
                        class="w-full h-[140px] bg-[#E6E6E6] rounded-lg px-4 py-3 outline-none resize-none placeholder-gray-600"></textarea>

                    <div class="flex justify-end"
                    style="margin-top: -4px;">
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-[#FF5949] to-[#B65A5A] text-white font-semibold px-8 py-2 rounded-lg hover:shadow-lg transition-all duration-300 hover:scale-105 -my-2">
                            Kirim
                        </button>
                    </div>

            </form>
            </div>
        </div>

    </div>
</div>
