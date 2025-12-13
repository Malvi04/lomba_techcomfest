<x-layouts.appOlh title="Olahraga">
<div class="w-full min-h-screen bg-[#DFA4A4] px-10 py-6 font-[Poppins]">

    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow">
                <img src="{{ Vite::asset('resources/images/dashboard/profile.png') }}" class="w-6" alt="">
            </div>
            <p class="text-white font-medium">User_name</p>
        </div>

        <a href="/dashboard"
           class="bg-[#FF3B30] text-white px-6 py-2 rounded-full font-semibold shadow">
            Dashboard
        </a>
    </div>

    <!-- TITLE -->
    <div class="text-center mt-10">
        <h1 class="text-white text-4xl font-extrabold">
            Pilih Program Olahragamu
        </h1>
        <p class="text-white text-lg mt-4">
            Sesuaikan aktivitas fisik dengan kondisi kesehatanmu
        </p>
        <p class="text-white mt-2 font-medium">
            Halo, User_name! Ayo pilih olahraga terbaikmu hari ini
        </p>
    </div>

    <!-- CONTENT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mt-16">

        <!-- CARD 1 -->
        <div class="flex flex-col items-center text-center">
            <img src="{{ Vite::asset('resources/images/olahraga/dia.jpeg') }}" class="w-60 h-72 object-cover rounded-xl shadow-lg">
            
            <p class="text-white font-medium mt-5 text-lg leading-relaxed">
                Olahraga ringan untuk <br>
                membantu kontrol gula <br>
                darah
            </p>

            <a href="dietSehat"
               class="mt-6 bg-[#FF3B30] text-white font-semibold px-6 py-3 rounded-full flex items-center gap-2 shadow">
               <img src="{{ Vite::asset('resources/images/icons/healty.png') }}" class="w-5">
               Diabetes
            </a>
        </div>

        <!-- CARD 2 -->
        <div class="flex flex-col items-center text-center">
            <img src="{{ Vite::asset('resources/images/olahraga/hidup.jpeg') }}" class="w-60 h-72 object-cover rounded-xl shadow-lg">

            <p class="text-white font-medium mt-5 text-lg leading-relaxed">
                Gerakan untuk <br>
                membakar kalori <br>
                secara efektif
            </p>

            <a href="dietSehat"
               class="mt-6 bg-[#FF3B30] text-white font-semibold px-6 py-3 rounded-full flex items-center gap-2 shadow">
               <img src="{{ Vite::asset('resources/images/icons/ep_food.png') }}" class="w-5">
               Diet Sehat
            </a>
        </div>

        <!-- CARD 3 -->
        <div class="flex flex-col items-center text-center">
            <img src="{{ Vite::asset('resources/images/olahraga/yoga.jpg') }}" class="w-60 h-72 object-cover rounded-xl shadow-lg">

            <p class="text-white font-medium mt-5 text-lg leading-relaxed">
                Olahraga harian untuk <br>
                menjaga kebugaran <br>
                tubuh
            </p>

            <a href="/hidupsehat"
               class="mt-6 bg-[#FF3B30] text-white font-semibold px-6 py-3 rounded-full flex items-center gap-2 shadow">
               <img src="{{ Vite::asset('resources/images/icons/sehat.png') }}" class="w-5">
               Hidup Sehat
            </a>
        </div>

    </div>

</div>

</x-layouts.appOlh>
