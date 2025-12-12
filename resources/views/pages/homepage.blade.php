<x-layouts.app title="GlucoGuide">
    <x-layouts.navbar />

    <section class="relative w-full h-[600px] overflow-hidden">

        <!-- VIDEO BACKGROUND -->
        <video 
            autoplay 
            loop 
            muted 
            playsinline 
            class="absolute inset-0 w-full h-full object-cover"
        >
            <source src="{{ asset('videos/GlucoGuide.mp4') }}" type="video/mp4">
        </video>

        <!-- OVERLAY GELAP (opsional biar teks kebaca) -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- TEXT CONTENT -->
        <div class="relative z-10 h-full flex flex-col items-center justify-center text-center text-white px-6">
            <h1 class="text-4xl font-bold mb-4 animate-slideFade">Selamat Datang di GlucoGuide</h1>
            <p class="text-lg mb-6 animate-slideFade">Pantau kesehatanmu & kelola hidup lebih baik setiap hari</p>

            <a href="/login"
            class="px-8 py-3 bg-white text-[#FF6B5E] rounded-xl font-semibold hover:bg-gray-100">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- HERO SECTION -->
    <section class=" bg-[#E8A8A2] pt-32 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-12 w-full px-6 md:px-12">
            <!-- LEFT -->
            <div class="space-y-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight reveal-blur ">
                    Kendalikan gula darah<br>sebelum mengendalikanmu
                </h1>
                <p class="text-white/90 text-lg md:text-xl max-w-xl leading-relaxed reveal-slideRight">
                    Solusi nutrisi seimbang untuk membantu menjaga kadar gula darah tetap stabil setiap hari
                </p>
                
                    <a href="/login"><button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
                        Mulai Hidup Sehat Disini
                    </button></a>

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
                        class="absolute left-1/2 bottom-10 transform
                        w-52 md:w-[400px] z-10 animate-floating" x-scrollshow>
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

    <!-- grafik -->
    <section class="bg-[#E8A8A2] py-20 px-6 md:px-16">
        <div class="w-full mx-auto">

            <!-- TITLE -->
            <h2 class="text-center text-2xl md:text-3xl font-bold text-white mb-10 leading-tight reveal-down">
                Diabetes Terus Meningkat, <br>
                Kesadaran Harus Dimulai Sekarang
            </h2>

            <!-- GRID: LEFT TEXT — GRAPH — RIGHT TEXT -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">

                <!-- LEFT TEXT -->
                <div class="text-white text-left md:pr-8">
                    <p class="font-bold text-4xl mb-2">Jumlah penderita diabetes di Indonesia</p>
                    <p class="font-bold">
                        meningkat hampir 4 <br>
                        kali lipat dalam 24 <br>
                        tahun terakhir.
                    </p>
                </div>

                <!-- SVG GRAPH -->
                <div class="flex justify-center">
                    <svg width="700" height="260" viewBox="0 0 700 260" xmlns="http://www.w3.org/2000/svg">

                        <!-- GRID LINES -->
                        <g stroke="#f5c1bc" stroke-width="1">
                            <line x1="80" y1="60" x2="820" y2="60"/>
                            <line x1="80" y1="110" x2="820" y2="110"/>
                            <line x1="80" y1="160" x2="820" y2="160"/>
                            <line x1="80" y1="210" x2="820" y2="210"/>
                            <line x1="80" y1="260" x2="820" y2="260"/>
                        </g>

                        <!-- DATA LINE -->
                        <polyline 
                            fill="none"
                            stroke="#6A3A37"
                            stroke-width="4"
                            points="
                                80,250
                                260,230
                                440,165
                                650,120
                            "
                        />

                        <!-- DATA POINTS -->
                        <circle cx="80" cy="250" r="7" fill="#6A3A37"/>
                        <circle cx="260" cy="230" r="7" fill="#6A3A37"/>
                        <circle cx="440" cy="165" r="7" fill="#6A3A37"/>
                        <circle cx="650" cy="120" r="7" fill="#6A3A37"/>

                        <!-- YEAR LABELS -->
                        <text x="80"  y="320" text-anchor="middle" fill="#fff" font-size="18">2000</text>
                        <text x="260" y="320" text-anchor="middle" fill="#fff" font-size="18">2011</text>
                        <text x="440" y="320" text-anchor="middle" fill="#fff" font-size="18">2016</text>
                        <text x="650" y="320" text-anchor="middle" fill="#fff" font-size="18">2024</text>

                        <!-- Y VALUE LABELS -->
                        <text x="20" y="65" fill="#fff" font-size="16">30,000</text>
                        <text x="20" y="115" fill="#fff" font-size="16">25,000</text>
                        <text x="20" y="165" fill="#fff" font-size="16">20,000</text>
                        <text x="20" y="215" fill="#fff" font-size="16">15,000</text>
                        <text x="20" y="265" fill="#fff" font-size="16">10,000</text>

                    </svg>
                </div>



                <!-- RIGHT TEXT -->
                <div class="text-white text-left md:pl-30 pt-40 text-1xl">
                    <p>
                        Memantau asupan <br>
                        dan kebiasaan hari ini bisa mencegah
                        risiko di masa <br>
                        depan.
                    </p>
                </div>

            </div>

            <!-- FOOTNOTE -->
            <p class="text-center text-white mt-8 text-sm">
                Sumber: International Diabetes Federation (IDF)
            </p>

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
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight reveal-down">
                    Mengapa Monitoring<br>Gula Darah Penting?
                </h2>

                <!-- Item 1 -->
                <div class="flex items-start gap-5">
                    <div class="bg-white/20 p-3 rounded-full backdrop-blur">
                        <span class="text-white text-3xl img-blink-pulse ">⚠️</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white reveal-slideRight">Cegah Komplikasi</h3>
                        <p class="text-white/90 reveal-slideRight">
                            Diabetes dapat menyebabkan kerusakan organ jika tidak dikontrol dengan baik.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex items-start gap-5">
                    <div class="bg-white/20 p-3 rounded-full backdrop-blur">
                        <span class="text-white text-3xl heartbeat">❤️</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white reveal-slideRight">Hidup lebih berkualitas</h3>
                        <p class="text-white/90 reveal-slideRight">
                            Kontrol gula darah membantu Anda tetap aktif dan produktif setiap hari.
                        </p>
                    </div>
                </div>

                <!-- CTA Button -->
                 <a href="/login">
                    <button class="mt-4 bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
                        Mulai Sekarang
                    </button>
                 </a>
                
            </div>
        </div>
    </section>

    <!-- Section mukbang makanan sehat -->
    <section class="bg-[#E8A8A2] py-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <!-- LEFT: Text -->
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight mb-6 reveal-slideRight">
                    Jaga
                    Gula Darahmu<br>
                    Lindungi<br>
                    Masa Depanmu
                </h2>
                <p class="text-white/90 text-lg md:text-xl max-w-md leading-relaxed reveal-slideRight">
                    Ingin pola makan lebih teratur?<br>
                    Pantau asupan, kenali kebiasaanmu,<br>
                    dan capai hidup yang lebih sehat<br>
                    bersama GlucoGuide.
                </p>
            </div>
            <!-- RIGHT: Image with circle bg -->
            <div class="flex justify-center md:justify-end relative">
                <!-- Food Image -->
                <img src="{{ Vite::asset('resources/images/leadingpage/makanan.png') }}"
                    alt="Healthy Food"
                    class="relative  object-cover reveal-rotate">
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
                    <div class="bg-white rounded-full px-6 py-2 shadow text-gray-800 font-medium text-sm pl-6 pr-24 relative z-10 flex items-center ">
                        <span class="typewrite-box">
                        <span class="text-left typewrite" data-text="Kebutuhan Karbo Harian">
                        </span>
                        </span>
                    </div>

                    <!-- CIRCLE PROGRESS + BACKGROUND CIRCLE -->
                    <div class="absolute top-[-30px] right-[-45px] z-20">
                        
                        <!-- BACKGROUND CIRCLE (PUTIH FULL) -->
                        <div class="absolute inset-0 w-[100px] h-[100px] rounded-full bg-white shadow-xl"></div>
                        
                        <!-- PROGRESS CIRCLE -->
                        <div class="relative w-[100px] h-[100px] rounded-full border-[10px] border-[#E85C4A] border-t-transparent flex items-center justify-center rotate-[-50deg]">
                         <span class="absolute text-xl font-semibold text-gray-800 rotate-[50deg]">87%</span>
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
                <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight mb-4 reveal-slideRight">
                    Kenali makananmu<br>
                    dengan lebih mudah
                </h2>
                <p class="text-white/90 text-lg md:text-xl max-w-lg leading-relaxed reveal-slideRight">
                    Lihat perkiraan kalori, gula, dan nutrisi penting,<br>
                    lalu bandingkan porsi untuk membantu menjaga pola makan<br>
                    yang lebih aman bagi gula darahmu.
                </p>
            </div>
        </div>
    </section>


<x-layouts.footer />
</x-layouts.app>