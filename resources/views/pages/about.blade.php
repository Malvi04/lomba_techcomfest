<x-layouts.app title="About">
    <x-layouts.navbar />
    <!-- Hero Section -->
    <section class="w-full min-h-screen bg-[#F5A7A7] flex items-center justify-center py-16 px-4">
        <div class="w-full max-w-7xl bg-[#D87373] rounded-[50px] p-12 lg:p-16 shadow-2xl">
            <div class="grid lg:grid-cols-3 gap-12 items-center text-white font-sans">

                <!-- Kiri: About Us Text -->
                <div class="space-y-8">
                    <div class="inline-block bg-white/20 px-10 py-3 rounded-full text-sm font-semibold">
                        About us
                    </div>

                    <p class="text-base leading-relaxed">
                        GlucoGuide lahir dari kebutuhan banyak orang untuk memahami makanan dengan cara yang lebih mudah. 
                        Kami percaya bahwa menjaga pola makan tidak harus ribet — cukup dimulai dari mengenali apa yang kita makan setiap hari.
                    </p>

                    <p class="text-base leading-relaxed">
                        Melalui fitur seperti rekomendasi kalori harian, analisis gula & karbo dari setiap makanan, 
                        serta tips harian yang praktis, GlucoGuide membantu kamu membangun kebiasaan sehat secara perlahan tapi konsisten.
                    </p>
                </div>

                <!-- Tengah: Logo -->
                <div class="flex justify-center">
                    <img 
                        src="{{ Vite::asset('resources/images/gluco.png') }}" 
                        alt="GlucoGuide Logo" 
                        class="w-72 lg:w-96 drop-shadow-2xl"
                    />
                </div>

                <!-- image dan kotak -->
                <div class="flex items-start gap-2"> 
                    <div class="w-[32%] flex flex-col items-start">
                        <!-- GRID 8 Kotak -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            @for($i = 0; $i < 8; $i++)
                                <div class="w-[46px] h-[46px] bg-white/70 rounded-md"></div>
                            @endfor
                        </div>

                        <!-- TEXT -->
                        <div class="text-white/90 leading-relaxed w-[260px]">
                            <p class="font-semibold mb-2">Tujuan kami sederhana:</p>

                            <p class="text-sm">
                                membantu kamu mengurangi risiko diabetes dengan cara yang aman, mudah, dan didukung informasi
                                nutrisi yang jelas. GlucoGuide bukan hanya aplikasi, tapi teman yang menemani perjalanan sehatmu.
                            </p>
                        </div>
                    </div>
                        <!-- FOTO -->
                        <img 
                            src="{{ Vite::asset('resources/images/about/mukbang.png') }}"
                            class="w-[260px] h-[260px] object-cover rounded-[40px] mb-6"
                            alt=""
                        >
                </div>
            </div>
        </div>
    </section>

    <!-- 3 step -->
     <section class="w-full bg-[#F5A7A7] py-20 px-6 text-white font-sans">

        <!-- Judul -->
        <h2 class="text-center text-3xl font-bold mb-4">
            3 Step Harian Capai Tujuanmu
        </h2>

        <!-- Subjudul -->
        <p class="text-center max-w-2xl mx-auto text-base leading-relaxed mb-14">
            Kami menyediakan apa yang kamu butuhkan dalam monitoring keseharianmu
            dengan tools bantu hidup sehat kurangi resiko terkena diabetes
        </p>

        <!-- CARD WRAPPER -->
        <div class="flex justify-center gap-10 flex-wrap">

            <!-- CARD 1 -->
            <div class="w-[300px] h-[420px] bg-gradient-to-br from-[#E97C73] to-[#DC5F5A] rounded-2xl shadow-lg relative p-8">
                <div class="w-full h-full border border-white/70 rounded-xl p-6 flex flex-col justify-between">

                    <!-- ICON -->
                    <div class="flex justify-center mb-6">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center">
                            <img src="{{ Vite::asset('resources/images/about/icon-sugar.png') }}" class="w-8 h-8" />
                        </div>
                    </div>

                    <!-- TEXT -->
                    <div class="text-center space-y-2">
                        <h3 class="font-semibold text-lg">Pantau Asupan Gulamu</h3>
                        <p class="text-sm leading-relaxed">
                            Lihat seberapa banyak gula & karbo dari makanan yang kamu pilih
                            untuk membantu menjaga gula darah.
                        </p>
                    </div>

                    <!-- LEARN MORE -->
                    <a href="#" class="text-sm mt-6 inline-block">Learn More →</a>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="w-[300px] h-[420px] bg-gradient-to-br from-[#E97C73] to-[#DC5F5A] rounded-2xl shadow-lg relative p-8">
                <div class="w-full h-full border border-white/70 rounded-xl p-6 flex flex-col justify-between">

                    <div class="flex justify-center mb-6">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center">
                            <img src="{{ Vite::asset('resources/images/about/icon-rice.png') }}" class="w-6 h-6" />
                        </div>
                    </div>

                    <div class="text-center space-y-0">
                        <h3 class="font-semibold text-lg">Rekomendasi Kalori Harian</h3>
                        <p class="text-sm leading-relaxed">
                            Dapatkan rekomendasi kalori harian yang disesuaikan
                            dengan umur, berat badan, dan aktivitasmu untuk menjaga pola makan lebih sehat.
                        </p>
                    </div>

                    <a href="#" class="text-sm mt-6 inline-block">Learn More →</a>
                </div>
            </div>
            

            <!-- CARD 3 -->
            <div class="w-[300px] h-[420px] bg-gradient-to-br from-[#E97C73] to-[#DC5F5A] rounded-2xl shadow-lg relative p-8">
                <div class="w-full h-full border border-white/70 rounded-xl p-6 flex flex-col justify-between">

                    <div class="flex justify-center mb-6">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center">
                            <img src="{{ Vite::asset('resources/images/about/icon-healty.png') }}" class="w-6 h-6" />
                        </div>
                    </div>

                    <div class="text-center space-y-2">
                        <h3 class="font-semibold text-lg">Tips Sehat Harian</h3>
                        <br>
                        <p class="text-sm leading-relaxed">
                            Tips ringan dan mudah diikuti untuk membantu kamu
                            membangun kebiasaan yang lebih sehat dan menurunkan risiko diabetes.
                        </p>
                    </div>

                    <a href="#" class="text-sm mt-6 inline-block">Learn More →</a>
                </div>
            </div>

        </div>

    </section>

    <!-- page kenapa harus -->
     <section class="w-full py-20 bg-[linear-gradient(180deg,#F5A7A7_50%,#FFD9D5_100%)] text-white">

        <!-- TITLE -->
        <div class="text-center mb-10">
            <h2 class="text-4xl font-extrabold">Kenapa harus GlucoGuide</h2>
            <p class="mt-2 text-lg">
                <span class="text-[#FF3333] font-semibold">benefit</span>
                pakai program GlucoGuide
            </p>
            <p class="mt-3 text-[17px] leading-relaxed max-w-3xl mx-auto">
                Kami menyediakan analisis nutrisi, rekomendasi kalori, dan tips kesehatan
                untuk bantu kamu menjaga gula darah tetap stabil.
            </p>
        </div>

        <!-- CONTENT WRAPPER -->
        <div class="flex justify-center items-start gap-20 mt-14">

            <!-- LEFT SIDE -->
            <div class="flex flex-col items-end text-right space-y-10">

                <!-- 1000+ -->
                <div>
                    <p class="text-3xl font-bold text-[#FF3333]">1000+</p>
                    <p class="text-sm leading-tight mt-1 translate-x-5">Makanan tersedia<br> dalam database nutrisi</p>
                </div>

                <!-- Driven -->
                <div class="flex flex-col items-end text-right">
                    <div class="flex items-center gap-2">
                        <p class="text-[15px] font-semibold text-[#FF3333] -translate-x-15">AI-Driven</p>
                        <span class="text-[#FF3333] text-lg -translate-x-15">
                            <img src="{{ Vite::asset('resources/images/about/icon-ceklis.png') }}" alt="">
                        </span>
                    </div>
                    <p class="text-sm leading-tight mt-1 -translate-x-10">
                        Analisis makanan<br> lebih cepat dan akurat
                    </p>
                </div>

            </div>

            <!-- CENTER IMAGE -->
            <div class="relative">
                <img src="{{ Vite::asset('resources/images/about/img-center.png') }}"
                    class="w-[500px] h-[330px] object-cover rounded-[54px] shadow-xl  border-4 border-[#FFFFFF]"
                    alt="">
                
                <!-- GRADIENT STRIPES -->
                <div class="absolute bottom-[-220px] inset-x-0 flex justify-center gap-6 opacity-100 pointer-events-none">
                    <div class="flex gap-4 -translate-x-45">
                        <div class="w-10 h-[290px] bg-gradient-to-t from-[#D37D7D]  rounded-xl -translate-y-10 "></div>
                        <div class="w-10 h-[350px] bg-gradient-to-t from-[#D37D7D]  rounded-xl -translate-y-25"></div>
                        <div class="w-10 h-[390px] bg-gradient-to-t from-[#D37D7D]  rounded-xl -translate-y-35"></div>
                    </div>
                    <div class="flex gap-4 translate-x-45">
                        <div class="w-10 h-[390px] bg-gradient-to-t from-[#D37D7D]  rounded-xl -translate-y-35"></div>
                        <div class="w-10 h-[350px] bg-gradient-to-t from-[#D37D7D]  rounded-xl -translate-y-25"></div>
                        <div class="w-10 h-[290px] bg-gradient-to-t from-[#D37D7D]  rounded-xl -translate-y-10"></div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="flex flex-col items-start text-left space-y-10">

                <!-- 95% -->
                <div>
                    <p class="text-3xl font-bold text-[#FF3333] ">95%</p>
                    <p class="text-sm leading-tight mt-1 -translate-x-5">
                        Merasa lebih teratur<br> soal pola makan
                    </p>
                </div>

                <!-- Evidence Based -->
                <div class="flex flex-col items-start">
                    <div class="flex items-center gap-2">
                        <span class="text-[#FF3333] text-lg translate-x-15">
                            <img src="{{ Vite::asset('resources/images/about/icon-ceklis.png') }}" alt="">
                        </span>
                        <p class="text-[15px] font-semibold text-[#FF3333] translate-x-15">Evidence-Based</p>
                    </div>
                    <p class="text-sm leading-tight mt-1 translate-x-10">
                        Rekomendasi nutrisi berdasarkan<br> standar kesehatan
                    </p>
                </div>

                <!-- User Friendly -->
                <div class="flex flex-col items-start">
                    <div class="flex items-center gap-2">
                        <span class="text-[#FF3333] text-lg translate-x-25">
                            <img src="{{ Vite::asset('resources/images/about/icon-ceklis.png') }}" alt="">
                        </span>
                        <p class="text-[15px] font-semibold text-[#FF3333] translate-x-25">User-Friendly</p>
                    </div>
                    <p class="text-sm leading-tight mt-1 translate-x-20">
                        Desain simpel dan mudah<br> dipakai siapa pun
                    </p>
                </div>

            </div>

        </div>
    </section>



    
    <x-layouts.footer />
</x-layouts.app>