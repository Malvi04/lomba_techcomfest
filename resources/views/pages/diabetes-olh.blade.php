<x-layouts.appOlh title="Olahraga">

<div class="w-full min-h-screen bg-[#D79797] px-10 py-6 font-[Poppins]">

    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path d="M14 14s-1-4-6-4-6 4-6 4 1 2 6 2 6-2 6-2"/>
                </svg>
            </div>
            <p class="text-white font-medium">User_name</p>
        </div>

        <a href="/dashboard"
           class="bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Dashboard
        </a>
    </div>

    <!-- TITLE -->
    <div class="mt-10">
        <h1 class="text-white text-3xl font-extrabold">Jaga Gula Darah Tetap Stabil</h1>
        <p class="text-white text-lg mt-3">
            Pilihan aktifitas yang cocok untuk menjaga <br> gula darah tetap stabil
        </p>
    </div>

    <!-- FILTER BUTTONS -->
    <div class="flex gap-4 mt-10">
        <button data-filter="all" class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow ring-2 ring-white">
            Semua
        </button>
        <button data-filter="low" class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Low - Impact
        </button>
        <button data-filter="cardio" class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Cardio
        </button>
        <button data-filter="kekuatan" class="filter-btn bg-[#FF2D2D] text-white px-6 py-2 rounded-full font-semibold shadow">
            Kekuatan
        </button>
    </div>

    <!-- ACTIVITY CARDS -->
    <div id="activityList" class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-12">

        <!-- CARD 1 -->
        <div data-category="low" class="activity-card bg-[#F2EFEE] w-full rounded-3xl shadow-md overflow-hidden">
            <div class="p-8 h-52 flex items-center justify-center">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image2.png') }}" class="w-40">
            </div>
            <div class="bg-[#EF6F5E] text-white p-5">
                <p class="font-bold text-lg">Jalan Kaki Cepat</p>
                <p class="text-sm mt-1">Jalan kaki cepat selama 30 menit</p>
            </div>
        </div>

        <!-- CARD 2 -->
        <div data-category="cardio" class="activity-card bg-[#F2EFEE] w-full rounded-3xl shadow-md overflow-hidden">
            <div class="p-8 h-52 flex items-center justify-center">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/Cycling.png') }}" class="w-40">
            </div>
            <div class="bg-[#EF6F5E] text-white p-5">
                <p class="font-bold text-lg">Bersepeda</p>
                <p class="text-sm mt-1">Bersepeda selama 40 menit</p>
            </div>
        </div>

        <!-- CARD 3 -->
        <div data-category="cardio" class="activity-card bg-[#F2EFEE] w-full rounded-3xl shadow-md overflow-hidden">
            <div class="p-8 h-52 flex items-center justify-center">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image.png') }}" class="w-40">
            </div>
            <div class="bg-[#EF6F5E] text-white p-5">
                <p class="font-bold text-lg">Renang</p>
                <p class="text-sm mt-1">Berenang selama 30 menit</p>
            </div>
        </div>

        <!-- CARD 4 -->
        <div data-category="low" class="activity-card bg-[#F2EFEE] w-full rounded-3xl shadow-md overflow-hidden">
            <div class="p-8 h-52 flex items-center justify-center">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image3.png') }}" class="w-40">
            </div>
            <div class="bg-[#EF6F5E] text-white p-5">
                <p class="font-bold text-lg">Yoga</p>
                <p class="text-sm mt-1">Yoga selama 30 menit</p>
            </div>
        </div>

        <!-- CARD 5 -->
        <div data-category="kekuatan" class="activity-card bg-[#F2EFEE] w-full rounded-3xl shadow-md overflow-hidden">
            <div class="p-8 h-52 flex items-center justify-center">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image4.png') }}" class="w-40">
            </div>
            <div class="bg-[#EF6F5E] text-white p-5">
                <p class="font-bold text-lg">Latihan Kekuatan</p>
                <p class="text-sm mt-1">Latihan kekuatan selama 20 menit</p>
            </div>
        </div>

        <!-- CARD 6 -->
        <div data-category="kekuatan" class="activity-card bg-[#F2EFEE] w-full rounded-3xl shadow-md overflow-hidden">
            <div class="p-8 h-52 flex items-center justify-center">
                <img src="{{ Vite::asset('resources/images/olahraga/diabetes/image5.png') }}" class="w-40">
            </div>
            <div class="bg-[#EF6F5E] text-white p-5">
                <p class="font-bold text-lg">Wall Sit</p>
                <p class="text-sm mt-1">Wall sit selama 1 menit</p>
            </div>
        </div>

    </div>

    <!-- WARNING -->
    <div class="mt-14 flex justify-center items-center gap-2 text-[#8B2E2E]">
        <img src="{{ Vite::asset('resources/images/olahraga/Warning.png') }}" alt="" class="w-6 h-6">
        <p class="font-semibold text-white">
           <span class="text-[#FF2D2D]">Peringatan</span> : Hanya program olahraga, selanjutnya konsultasikan dengan dokter anda
        </p>
    </div>

</div>



</x-layouts.appOlh>
