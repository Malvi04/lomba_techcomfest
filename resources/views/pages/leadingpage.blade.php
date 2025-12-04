<x-layouts.app title="GlucoMeal">
    <x-layouts.navbar />

    <!-- HERO SECTION -->
    <section class=" bg-[#E8A8A2] pt-32 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-12 w-full px-6 md:px-12">
            <!-- LEFT -->
            <div class="space-y-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                    Kendalikan gula darah<br>sebelum mengendalikanmu
                </h1>
                <p class="text-white/90 text-lg md:text-xl max-w-xl leading-relaxed">
                    Solusi nutrisi seimbang untuk membantu menjaga kadar gula darah tetap stabil setiap hari
                </p>
                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
                    Mulai hidup sehat disini
                </button>
            </div>
            <!-- RIGHT -->
            <div class="flex justify-center md:justify-end">
                <div class="relative w-[360px] h-[380px] flex items-end">
                    
                    <!-- Background Arch -->
                    <div class="absolute inset-x-0 top-0 mx-auto
                        w-[315px] h-[360px]
                        bg-pink-200
                        rounded-t-[300px]
                        rounded-b-[20px]">
                    </div>
                    <img src="{{ Vite::asset('resources/images/leadingpage/p.png') }}"
                        alt="Blood drop"
                        class="absolute left-1/2 bottom-10 transform -translate-x-1/2
                        w-52 md:w-[400px] z-10">
                        <!-- untuk buttom untuk mengaatur jarak atas bawah  -->

                    <!-- Sugar Cubes (Diposisikan ke Kiri Darah) -->
                    <img src="{{ Vite::asset('resources/images/leadingpage/sugar.png') }}"
                        alt="Sugar cubes"
                        class="absolute bottom-0
                        left-[-6%]     <!-- posisi kiri yang paling pas -->
                        w-56 md:w-70 z-20">

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Mengapa Monitoring Gula Darah Penting -->

    <section
        class="py-20 px-6 md:px-12 bg-cover bg-no-repeat bg-left"
        style="background-image: url('{{ Vite::asset('resources/images/leadingpage/tangan.png') }}');"
    >
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- LEFT (Empty for image background only) -->
            <div class="hidden md:block"></div>
            <!-- RIGHT TEXT -->
            <div class="space-y-8 md:pl-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight">
                    Mengapa Monitoring<br>Gula Darah Penting?
                </h2>

                <!-- Item 1 -->
                <div class="flex items-start gap-5">
                    <div class="bg-white/20 p-3 rounded-full backdrop-blur">
                        <span class="text-white text-3xl">⚠️</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Cegah Komplikasi</h3>
                        <p class="text-white/90">
                            Diabetes dapat menyebabkan kerusakan organ jika tidak dikontrol dengan baik.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex items-start gap-5">
                    <div class="bg-white/20 p-3 rounded-full backdrop-blur">
                        <span class="text-white text-3xl">❤️</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Hidup lebih berkualitas</h3>
                        <p class="text-white/90">
                            Kontrol gula darah membantu Anda tetap aktif dan produktif setiap hari.
                        </p>
                    </div>
                </div>

                <!-- CTA Button -->
                <button class="mt-4 bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
                    Mulai Sekarang
                </button>
            </div>
        </div>
    </section>

    <!-- Section mukbang makanan sehat -->
    <section class="bg-[#E8A8A2] py-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <!-- LEFT: Text -->
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight mb-6">
                    Jaga
                    Gula Darahmu<br>
                    Lindungi<br>
                    Masa Depanmu
                </h2>
                <p class="text-white/90 text-lg md:text-xl max-w-md leading-relaxed">
                    Ingin pola makan lebih teratur?<br>
                    Pantau asupan, kenali kebiasaanmu,<br>
                    dan capai hidup yang lebih sehat<br>
                    bersama GlucoMeal.
                </p>
            </div>
            <!-- RIGHT: Image with circle bg -->
            <div class="flex justify-center md:justify-end relative">
                <!-- Food Image -->
                <img src="{{ Vite::asset('resources/images/leadingpage/makanan.png') }}"
                    alt="Healthy Food"
                    class="relative  object-cover">
            </div>
        </div>
    </section>

    <!-- Section kenali  -->
    <section class="bg-[#E8A8A2] py-20 px-6 md:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-12 relative">
            <!-- LEFT: Card & Progress -->
            <div class="relative flex flex-col items-start">
                <!-- Dotted Background -->
                <div class="absolute left-0 top-0 w-[400px] h-[400px] z-0">
                    <!-- <svg width="100%" height="100%">
                        <defs>
                            <pattern id="dots" x="0" y="0" width="16" height="16" patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="#d48b83" />
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#dots)" />
                    </svg> -->
                    <img src="{{ Vite::asset('resources/images/leadingpage/bg-bulet.png')}}" 
                    alt="bg"/>
                </div>
                <!-- Progress Bar -->
                <div class="flex items-center z-10 mb-2 ml-8">
                    <div class="relative w-fit">

                    <!-- BADGE TEXT (ALIGN LEFT) -->
                    <div class="bg-white rounded-full px-6 py-2 shadow text-gray-800 font-medium text-sm pl-6 pr-24 relative z-10 flex items-center">
                        <span class="text-left">Kebutuhan Karbo Harian</span>
                    </div>

                    <!-- CIRCLE PROGRESS + BACKGROUND CIRCLE -->
                    <div class="absolute top-[-30px] right-[-45px] z-20">
                        
                        <!-- BACKGROUND CIRCLE (PUTIH FULL) -->
                        <div class="absolute inset-0 w-[100px] h-[100px] rounded-full bg-white shadow-xl"></div>
                        
                        <!-- PROGRESS CIRCLE -->
                        <div class="relative w-[100px] h-[100px] rounded-full border-[10px] border-[#E85C4A] border-t-transparent flex items-center justify-center">
                            <span class="text-xl font-semibold text-gray-800">87%</span>
                        </div>
                    </div>

                </div>
                </div>
                <!-- Food Cards -->
                <div class="flex gap-5 mt-2 ml-5 z-10">
                    <div>
                        <img src="{{ Vite::asset('resources/images/leadingpage/nasgor.png') }}"
                            alt="Oatmeal"
                            class="object-cover w-full h-full rounded-sm">
                    </div>
                    
                </div>
            </div>
            <!-- RIGHT: Text -->
            <div class="z-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight mb-4">
                    Kenali makananmu<br>
                    dengan lebih mudah
                </h2>
                <p class="text-white/90 text-lg md:text-xl max-w-lg leading-relaxed">
                    Lihat perkiraan kalori, gula, dan nutrisi penting,<br>
                    lalu bandingkan porsi untuk membantu menjaga pola makan<br>
                    yang lebih aman bagi gula darahmu.
                </p>
            </div>
        </div>
    </section>


<x-layouts.footer />
</x-layouts.app>