<x-layouts.app title="Services">
    <x-layouts.navbar />

    <!-- bagian yang lucu kaya malvi kata paros -->
    <section class="w-full bg-[#E8A8A2] py-16 md:py-20 px-6 md:px-12">
        <div class="w-full max-w-7xl mx-auto">

            <div class="relative overflow-hidden rounded-[33px]
            bg-gradient-to-br from-[#C8514D] via-[#D66D67] to-[#D6847E]
            min-h-[420px] md:min-h-[550px]">

                <!-- SHAPE KANAN (MENYATU, PANJANG, ADA INNER SHADOW) -->
                <div class="absolute right-0 top-0 h-98 w-[40%] bg-[#E8A8A2]
                             rounded-bl-[80px]
                            shadow-inner shadow-black/20">
                </div>

                <!-- IMAGE DI TENGAH SHAPE KANAN -->
                <div class="absolute right-0 top-0 h-95 w-[40%] flex items-center justify-center z-20">
                    <img src="{{ Vite::asset('resources/images/services/gula_lucu.png') }}"
                        class="w-56 md:w-72 object-contain drop-shadow-lg" alt="">
                </div>

                <!-- GRID CONTENT -->
                <div class="relative grid grid-cols-1 md:grid-cols-2 gap-10 p-10 md:p-16 z-10">

                    <!-- LEFT SIDE -->
                    <div class="flex flex-col justify-center">
                        <h2 class="text-white text-3xl md:text-[34px] font-bold mb-6">
                            Our Services
                        </h2>

                        <br>
                        <p class="text-white text-[18px] leading-relaxed max-w-sm ml-4 md:ml-6">
                            Melalui pendekatan yang lebih personal dan mudah dipahami, 
                            kami menyediakan layanan yang membantu Anda memonitor pola makan,
                            memahami kondisi tubuh, serta menjaga gula darah tetap stabil.
                            Semua dirancang untuk mendukung kesehatan Anda setiap hari.
                        </p>
                    </div>

                    <!-- KANAN KOSONG karena image sudah diposisikan manual -->
                    <div></div>

                </div>
            </div>

        </div>
    </section>

    <!-- layanan yang di berikan -->
    <section class="w-full bg-[#E8A8A2] py-20 px-6 md:px-16 font-sans">
        <div class="text-center mb-12">
            <h2 class="text-white text-3xl md:text-4xl font-bold mb-4">
                Layanan yang kami berikan
            </h2>
            <p class="text-white/90 max-w-3xl mx-auto text-base md:text-lg leading-relaxed">
                Dari memantau gula darah hingga rekomendasi makanan sehat, kami hadir untuk 
                mendukung perjalanan hidup sehatmu setiap hari.
            </p>
        </div>

        <!-- CARD WRAPPER -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 place-items-center">
            
            <!-- CARD 1 -->
            <div class="w-[280px] h-[420px] rounded-xl bg-gradient-to-br from-[#E47065] to-[#DF726F] p-6 relative">
                <div class="absolute inset-3 border border-white/60 rounded-xl"></div>

                <div class="relative z-10 flex flex-col items-center text-center mt-4">
                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4">
                        <img src="{{ Vite::asset('resources/images/icons/m.png') }}" class="w-5" />
                    </div>

                    <h3 class="text-white font-semibold text-lg mb-2">Monitoring</h3>
                    <p class="text-white/90 text-sm leading-relaxed px-1">
                        Membantu Anda memonitor nutrisi, kalori, dan fat dalam setiap makanan menggunakan 
                        teknologi AI sebelum dikonsumsi, sehingga Anda dapat membuat keputusan 
                        makan yang lebih sehat.
                    </p>

                    <a href="/login" class="text-white text-sm mt-6 inline-flex items-center gap-1">
                        Learn More →
                    </a>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="w-[280px] h-[420px] rounded-xl bg-gradient-to-br from-[#E47065] to-[#DF726F] p-6 relative">
                <div class="absolute inset-3 border border-white/60 rounded-xl"></div>

                <div class="relative z-10 flex flex-col items-center text-center mt-4">
                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4">
                        <img src="{{ Vite::asset('resources/images/icons/h.png') }}" class="w-5" />
                    </div>

                    <h3 class="text-white font-semibold text-lg mb-2">Tips Healty Diet</h3>
                    <p class="text-white/90 text-sm leading-relaxed px-1">
                        Menyediakan berbagai tips diet sehat yang mudah diterapkan untuk membantu 
                        Anda membangun kebiasaan makan yang lebih teratur dan bergizi setiap hari.
                    </p>

                    <a href="/login" class="text-white text-sm mt-6 inline-flex items-center gap-1">
                        Learn More →
                    </a>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="w-[280px] h-[420px] rounded-xl bg-gradient-to-br from-[#E47065] to-[#DF726F] p-6 relative">
                <div class="absolute inset-3 border border-white/60 rounded-xl"></div>

                <div class="relative z-10 flex flex-col items-center text-center mt-4">
                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4">
                        <img src="{{ Vite::asset('resources/images/icons/s.png') }}" class="w-10" />
                    </div>

                    <h3 class="text-white font-semibold text-lg mb-2">Tips Healty Food</h3>
                    <p class="text-white/90 text-sm leading-relaxed px-1">
                        Memberikan informasi dan panduan memilih makanan sehat yang sesuai 
                        dengan kebutuhan tubuh Anda, sehingga Anda dapat membangun pola makan 
                        yang lebih bergizi dan seimbang setiap hari.
                    </p>

                    <a href="/login" class="text-white text-sm mt-6 inline-flex items-center gap-1">
                        Learn More →
                    </a>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="w-[280px] h-[420px] rounded-xl bg-gradient-to-br from-[#E47065] to-[#DF726F] p-6 relative">
                <div class="absolute inset-3 border border-white/60 rounded-xl"></div>

                <div class="relative z-10 flex flex-col items-center text-center mt-4">
                    <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center mb-4">
                        <img src="{{ Vite::asset('resources/images/icons/r.png') }}" class="w-6" />
                    </div>

                    <h3 class="text-white font-semibold text-lg mb-2">Recomendations</h3>
                    <p class="text-white/90 text-sm leading-relaxed px-1">
                        Menyajikan rekomendasi makanan dan pola makan yang disesuaikan dengan 
                        kondisi dan kebutuhan Anda untuk membantu menjaga kesehatan dan 
                        mencapai tujuan nutrisi harian.
                    </p>

                    <a href="/login" class="text-white text-sm mt-6 inline-flex items-center gap-1">
                        Learn More →
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- 3 -->
    <section class="w-full bg-[#E8A8A2] py-20 px-6 text-white">
    <div class="max-w-6xl mx-auto text-center">

        <!-- Title -->
        <h2 class="text-3xl font-bold mb-6">Manfaat Yang Anda Dapatkan</h2>

        <!-- Subtext -->
        <p class="text-base leading-relaxed max-w-3xl mx-auto mb-16">
            Manfaat berikut dirancang untuk memberikan Anda pengalaman mengelola nutrisi yang lebih cerdas. 
            Dengan analisis makanan berbasis AI, sistem akan membantu Anda mengontrol gula darah, 
            memahami pola makan, dan menjaga kesehatan secara efisien.
        </p>

        <!-- Benefits Row -->
        <div class="flex items-center justify-center w-full gap-10 mt-10">

            <!-- Icon 1 -->
            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center shadow">
                <img src="{{ Vite::asset('resources/images/icons/rubik.png') }}" class="w-10 h-10">
            </div>

            <!-- Line -->
            <div class="w-40 h-[2px] bg-white/50"></div>

            <!-- Icon 2 -->
            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center shadow">
                <img src="{{ Vite::asset('resources/images/icons/monitor.png') }}" class="w-10 h-10">
            </div>

            <!-- Line -->
            <div class="w-40 h-[2px] bg-white/50"></div>

            <!-- Icon 3 -->
            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center shadow">
                <img src="{{ Vite::asset('resources/images/icons/heart.png') }}" class="w-10 h-10">
            </div>

            <!-- Line -->
            <div class="w-40 h-[2px] bg-white/50"></div>

            <!-- Icon 4 -->
            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center shadow">
                <img src="{{ Vite::asset('resources/images/icons/veg_food.png') }}" class="w-10 h-10">
            </div>

        </div>

        <!-- text -->
        <div class="flex justify-center w-full gap-40 mt-6">

            <p class="text-center text-white text-sm w-40">
                Mengontrol gula darah dengan lebih mudah menggunakan AI
            </p>

            <p class="text-center text-white text-sm w-40">
                Memahami kandungan <br> nutrisi makanan
            </p>

            <p class="text-center text-white text-sm w-40">
                Membantu menjaga <br> berat badan
            </p>

            <p class="text-center text-white text-sm w-40">
                Memperbaiki pola <br> makan sehari–hari
            </p>

        </div>


    </div>
</section>




    <x-layouts.footer />
</x-layouts.app>