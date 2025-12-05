<x-layouts.app title="Hasil Pemeriksaan">
    <style>
        body {
            background-color: #F8C7C7 !important;
        }
        .page-container {
            padding-top: 0 !important;
        }
    </style>

    <div class="page-container min-h-screen bg-[#F8C7C7]">
    <div class="max-w-[1200px] mx-auto px-6">

        {{-- TITLE HEADER --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-[#2B2B2B]">Hasil Pemeriksaan Awal</h1>
            <p class="text-[#4A4A4A] mt-1">
                Kami telah menyesuaikan kebutuhan nutrisi berdasarkan data yang kamu isi.
            </p>
        </div>

        {{-- GRID 2x2 --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- BOX 1 — Kalori Harian --}}
            <div class="bg-[#FF6F6F] rounded-[28px] p-6 relative overflow-hidden ">
                <p class="text-white font-semibold text-3xl text-center ">Kalori Harian</p>

                <p class="text-white font-bold text-4xl mt-20 text-center -translate-y-5">2200 kcal</p>

                {{-- Progress Bar Stroke --}}
                <div class="absolute right-6 top-6 flex flex-col justify-end h-full">
                    <div class="bottom-10 w-4 h-[200px] bg-white rounded-full relative">
                        <div class="absolute bottom-0 left-0 right-0 h-[160px] bg-[#8B0000] rounded-full"></div>
                    </div>
                </div>
            </div>

                {{-- BOX 2 — Gula Harian + Tips --}}
                <div class="bg-gradient-to-r from-[#FFA0A0] to-[#FF8B8B] rounded-[28px] p-6">
                    <p class="text-white font-semibold text-3xl">Gula Harian</p>

                    {{-- Flex row: oval & tips --}}
                    <div class="mt-1 flex items-center gap-6">

                        {{-- OVAL 30 GRAM --}}
                        <div class="p-6 border-4 border-[#FF6F6F] rounded-full">
                            <p class="text-white text-3xl font-semibold whitespace-nowrap">30 Gram</p>
                        </div>

                        {{-- TIPS --}}
                        <div class="flex flex-col">
                            <p class="text-white font-bold text-lg -translate-y-6">Tips Awal</p>
                            <p class="text-white text-sm leading-snug mt-1 w-[250px] -translate-y-6">
                                gunakan awal pagi dengan berolahraga kecil seperti lari kecil atau senam 5 menit <br><br>
                                mulai perubahan kecil setiap harinya maka progress kamu akan bagus dan konsisten
                            </p>
                        </div>
                    <img src="{{ Vite::asset('resources/images/icons/run.png') }}" 
                         alt="" class="w-14 opacity-90">
                </div>
            </div>

            {{-- BOX 3 — Karbohidran --}}
            <div class="bg-[#FF6F6F] rounded-[28px] p-6 relative overflow-hidden">
                <p class="text-white font-semibold text-3xl text-center">Karbohidran</p>

                <p class="text-white font-bold text-4xl mt-20 text-center -translate-y-10">250 Gram</p>

                {{-- Double Stroke Bar --}}
                <div class="absolute right-6 top-6 flex flex-row items-end gap-2">
                    <div class="w-4 h-[120px] translate-y-2 bg-white rounded-full "></div>
                    <div class="w-4 h-[150px] translate-y-2 bg-white rounded-full"></div>
                </div>
            </div>

            {{-- BOX 4 — Kualitas Tidur --}}
            <div class="bg-gradient-to-r from-[#FFA0A0] to-[#FF8B8B] rounded-[28px] p-6">
                <p class="text-white font-semibold text-3xl">Kualitas Tidur</p>

                <div class="flex items-center gap-6 mt-4">

                    {{-- OVAL --}}
                    <div class="p-6 border-4 border-[#FF6F6F] rounded-full inline-block">
                        <p class="text-white text-3xl font-semibold whitespace-nowrap">Bagus</p>
                    </div>

                    {{-- TEKS --}}
                    <div class="-mt-2">
                        <p class="text-white font-bold text-lg leading-tight">
                            Pertahankan kualitas <br> Tidur Yang Baik
                        </p>
                        <p class="text-white text-sm leading-snug mt-1 w-[260px]">
                            kualitas tidur kamu sudah bagus, terus pertahankan ya supaya gula darah kamu juga bagus
                        </p>
                    </div>

                    <img src="{{ Vite::asset('resources/images/icons/sleep.png') }}" 
                         alt="" class="w-14 opacity-90">
                </div>
            </div>

        </div>
    </div>
</div>

    <div class="w-full bg-[#F8C8C8] py-12">
        <div class="max-w-[1200px] mx-auto px-6">



        </div>
    </div>

</x-layouts.app>