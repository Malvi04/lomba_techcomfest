<!-- resources/views/diet-sehat.blade.php -->
<x-layouts.appOlh title="Olahraga">

<div class="w-full min-h-screen bg-[#E8A3A0] px-6 md:px-10 py-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path d="M14 14s-1-4-6-4-6 4-6 4 1 2 6 2 6-2 6-2"/>
                </svg>
            </div>
            <p class="text-white font-medium">{{ $user->username }}</p>
        </div>
        <a href="/dashboard" class="bg-red-600 text-white px-5 py-2 rounded-full font-semibold">
            Dashboard
        </a>
    </div>

    <!-- TITLE -->
    <div class="text-white mb-10 max-w-2xl">
        <h1 class="text-3xl font-bold mb-2">Jaga Pola Kesehatanmu</h1>
        <p class="text-lg">
            Pilihan aktivitas yang cocok untuk menjaga<br>
            berat badan tetap stabil
        </p>
    </div>

    <!-- FILTER -->
    <div class="flex flex-wrap gap-4 mt-10">
        <button data-filter="all"
            class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow ring-2 ring-white">
            Semua
        </button>
        <button data-filter="low"
            class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Low - Impact
        </button>
        <button data-filter="cardio"
            class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Cardio
        </button>
        <button data-filter="kekuatan"
            class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Kekuatan
        </button>
    </div>

    <!-- GRID -->
    <div id="activityList"
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-12 items-stretch">

        <!-- Jogging -->
        <div class="activity-card bg-[#F6F1EE] rounded-[32px] overflow-hidden flex flex-col h-full shadow"
             data-category="cardio">
            <div class="flex items-center justify-center flex-1 py-12">
                <img src="{{ Vite::asset('resources/images/olahraga/diet/lari.png') }}" class="w-36 md:w-40">
            </div>
            <div class="bg-[#F36B5B] text-white p-6">
                <h3 class="text-xl font-semibold mb-2">Jogging</h3>
                <p class="text-sm">
                    Membakar kalori dengan cepat dan meningkatkan stamina secara signifikan
                </p>
            </div>
        </div>

        <!-- Bersepeda -->
        <div class="activity-card bg-[#F6F1EE] rounded-[32px] overflow-hidden flex flex-col h-full shadow"
             data-category="cardio">
            <div class="flex items-center justify-center flex-1 py-12">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/Cycling.png') }}" class="w-36 md:w-40">
            </div>
            <div class="bg-[#F36B5B] text-white p-6">
                <h3 class="text-xl font-semibold mb-2">Bersepeda</h3>
                <p class="text-sm">
                    Cocok untuk latihan luar ruangan dan memperkuat otot kaki
                </p>
            </div>
        </div>

        <!-- Renang -->
        <div class="activity-card bg-[#F6F1EE] rounded-[32px] overflow-hidden flex flex-col h-full shadow"
             data-category="cardio">
            <div class="flex items-center justify-center flex-1 py-12">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image.png') }}" class="w-36 md:w-40">
            </div>
            <div class="bg-[#F36B5B] text-white p-6">
                <h3 class="text-xl font-semibold mb-2">Renang</h3>
                <p class="text-sm">
                    Olahraga full-body yang sangat baik dan ramah sendi
                </p>
            </div>
        </div>

        <!-- Tai Chi -->
        <div class="activity-card bg-[#F6F1EE] rounded-[32px] overflow-hidden flex flex-col h-full shadow"
             data-category="low">
            <div class="flex items-center justify-center flex-1 py-12">
                <img src="{{ Vite::asset('resources/images/olahraga/hidupsehat/image 9.png') }}" class="w-32 md:w-36">
            </div>
            <div class="bg-[#F36B5B] text-white p-6">
                <h3 class="text-xl font-semibold mb-2">Tai Chi</h3>
                <p class="text-sm">
                    Gerakan lembut dan mengalir yang meningkatkan keseimbangan dan ketenangan pikiran
                </p>
            </div>
        </div>

        <!-- Latihan Kekuatan -->
        <div class="activity-card bg-[#F6F1EE] rounded-[32px] overflow-hidden flex flex-col h-full shadow"
             data-category="kekuatan">
            <div class="flex items-center justify-center flex-1 py-12">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image4.png') }}" class="w-32 md:w-36">
            </div>
            <div class="bg-[#F36B5B] text-white p-6">
                <h3 class="text-xl font-semibold mb-2">Latihan Kekuatan</h3>
                <p class="text-sm">
                    Menggunakan barbell, dumbbell, atau mesin gym untuk menambah massa otot
                </p>
            </div>
        </div>

        <!-- Zumba -->
        <div class="activity-card bg-[#F6F1EE] rounded-[32px] overflow-hidden flex flex-col h-full shadow"
             data-category="cardio">
            <div class="flex items-center justify-center flex-1 py-12">
                <img src="{{ Vite::asset('resources/images/olahraga/hidupsehat/image 10.png') }}" class="w-32 md:w-36">
            </div>
            <div class="bg-[#F36B5B] text-white p-6">
                <h3 class="text-xl font-semibold mb-2">Zumba</h3>
                <p class="text-sm">
                    Kebugaran menyenangkan dengan musik, efektif membakar lemak
                </p>
            </div>
        </div>

    </div>

    <!-- WARNING -->
    <div class="flex items-center justify-center gap-3 mt-14 text-red-700 font-semibold text-center px-4">
        <span>⚠️</span>
        <p class="font-semibold text-white">
           <span class="text-[#FF2D2D]">Peringatan</span> : Hanya program olahraga, selanjutnya konsultasikan dengan dokter anda
        </p>
    </div>

</div>

</x-layouts.appOlh>
