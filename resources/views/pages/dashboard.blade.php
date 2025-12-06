<x-layouts.app title="Dashboard">

<div class="min-h-screen bg-gradient-to-b from-[#E9A39A] to-[#C98C7E] p-8 text-white">

    <!-- TOP BAR -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/icons/user.png') }}" class="w-10 h-10">
            <span class="font-semibold">User_name</span>
        </div>

        <img src="{{ asset('images/icons/setting.png') }}" class="w-8 h-8">
    </div>

    <!-- PROGRESS CARD -->
    <div class="bg-gradient-to-r from-[#FF6A5E] to-[#FF4D4D] rounded-3xl p-6 flex items-center justify-between mb-8">

        <!-- LEFT -->
        <div class="w-2/3">
            <div class="flex items-center gap-2 mb-3">
                <img src="{{ asset('images/icons/chart.png') }}" class="w-5">
                <p class="font-semibold">Progress Kamu</p>
            </div>

            <div class="grid grid-cols-3 gap-6 text-sm mb-3">
                <p>Protein<br><b>60.2 g</b></p>
                <p>Karbo<br><b>200 g</b></p>
                <p>Kalori<br><b>1000 g</b></p>
            </div>

            <!-- BAR -->
            <div class="relative w-full h-4 bg-white/50 rounded-full overflow-hidden">
                <div class="absolute left-0 top-0 h-full w-[70%] bg-white rounded-full"></div>
            </div>
            <p class="text-center mt-1 text-sm">70%</p>
        </div>

        <!-- RIGHT CIRCLE -->
        <div class="relative">
            <div class="w-24 h-24 rounded-full border-[10px] border-red-900/40 flex items-center justify-center">
                <span class="text-xl font-bold">70%</span>
            </div>
        </div>
    </div>

    <!-- NUTRITION TITLE -->
    <p class="mb-4 text-lg font-semibold">Nutrisi yang harus kamu penuhi hari ini :</p>

    <!-- CARD ROW -->
    <div class="grid grid-cols-4 gap-4 mb-8">

        <!-- NUTRITION -->
        <div class="bg-gradient-to-b from-[#FF6A5E] to-[#FF4D4D] rounded-2xl p-5 col-span-1">
            <p class="font-semibold mb-3">Gula &nbsp; Karbo &nbsp; Kalori</p>
            <p>120 g &nbsp; 300 g &nbsp; 1200 g</p>
        </div>

        <!-- SLEEP -->
        <div class="bg-[#FF6A5E] rounded-2xl p-5 flex justify-between items-center">
            <img src="{{ asset('images/icons/bed.png') }}" class="w-10">
            <span>→</span>
        </div>

        <!-- SPORT -->
        <div class="bg-[#FF6A5E] rounded-2xl p-5 flex justify-between items-center">
            <img src="{{ asset('images/icons/run.png') }}" class="w-10">
            <span>→</span>
        </div>

        <!-- TIPS -->
        <div class="bg-[#FF6A5E] rounded-2xl p-5 flex justify-between items-center">
            <img src="{{ asset('images/icons/lamp.png') }}" class="w-10">
            <span>→</span>
        </div>
    </div>

    <!-- FOOD LOG -->
    <div class="mb-6">
        <p class="mb-2">Ini adalah catatan makanan kamu :</p>
        <p>Hi, User</p>
        <p>Mau makan apa hari ini ?</p>
    </div>

    <!-- FOOD ITEM -->
    <div class="border border-white/70 rounded-full px-6 py-4 flex justify-between mb-4">
        <p>Rendang</p>
        <div class="flex gap-10 text-sm">
            <span>25g</span>
            <span>25g</span>
            <span>25g</span>
            <span>13%</span>
        </div>
    </div>

    <!-- ADD FOOD -->
    <button class="border border-white/70 rounded-full py-4 w-full mb-6">
        + Tambah Makanan
    </button>

    <!-- UPLOAD PHOTO -->
    <div class="border-2 border-dashed border-white/70 rounded-3xl p-16 flex flex-col items-center gap-3">
        <img src="{{ asset('images/icons/camera.png') }}" class="w-12">
        <p>Tambahkan dengan foto</p>
    </div>

    <!-- FOOTER CTA -->
    <div class="flex justify-end mt-6">
        <p class="flex items-center gap-2 cursor-pointer">
            Yuk lihat tips lainnya
            <span>→</span>
        </p>
    </div>

</div>

</x-layouts.app>
