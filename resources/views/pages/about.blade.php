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
                        GlucoMeal lahir dari kebutuhan banyak orang untuk memahami makanan dengan cara yang lebih mudah. 
                        Kami percaya bahwa menjaga pola makan tidak harus ribet — cukup dimulai dari mengenali apa yang kita makan setiap hari.
                    </p>

                    <p class="text-base leading-relaxed">
                        Melalui fitur seperti rekomendasi kalori harian, analisis gula & karbo dari setiap makanan, 
                        serta tips harian yang praktis, GlucoMeal membantu kamu membangun kebiasaan sehat secara perlahan tapi konsisten.
                    </p>
                </div>

                <!-- Tengah: Logo -->
                <div class="flex justify-center">
                    <img 
                        src="{{ Vite::asset('resources/images/gluco.png') }}" 
                        alt="GlucoMeal Logo" 
                        class="w-72 lg:w-96 drop-shadow-2xl"
                    />
                </div>

                <!-- Kanan: Grid Icon + Foto + Tujuan -->
                <div class="flex flex-col lg:flex-row gap-8 items-start">
                    <!-- 8 kotak (2 kolom × 4 baris) di sebelah kiri foto -->
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        @for($i = 0; $i < 8; $i++)
                            <div class="w-12 h-12 lg:w-14 lg:h-14 bg-white/40 rounded-2xl"></div>
                        @endfor
                    </div>

                    <!-- Foto + Teks tujuan -->
                    <div class="flex-6 space-y-4">
                        <img 
                            src="{{ Vite::asset('resources/images/about/mukbang.png') }}" 
                            alt="Healthy Eating" 
                            class="w-full max-w-xs lg:max-w-sm rounded-3xl object-cover shadow-2xl lg:mx-1"
                        />

                        <div class="space-y-3 text-sm lg:text-base">
                            <p class="font-semibold text-lg">Tujuan kami sederhana :</p>
                            <p class="leading-relaxed">
                                membantu kamu mengurangi risiko diabetes dengan cara yang aman, mudah, 
                                dan didukung informasi nutrisi yang jelas. GlucoMeal bukan hanya aplikasi, 
                                tapi teman yang menemani perjalanan sehatmu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3 step -->

    
    <x-layouts.footer />
</x-layouts.app>