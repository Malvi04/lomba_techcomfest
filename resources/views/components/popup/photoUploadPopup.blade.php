<!-- OVERLAY -->
<div
    x-show="photoOpen"
    x-transition.opacity
    x-cloak
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    @click.self="photoOpen = false"
>

    <!-- POPUP CARD -->
    <div class="w-[681px] h-[683px] bg-gradient-to-b from-[#D88E86] to-[#F2C1BB]
                rounded-[28px] shadow-xl p-6 flex flex-col justify-between">

        <!-- HEADER -->
        <div class="flex items-center gap-2 text-white font-semibold text-lg">
            <img src="{{ asset('images/icons/camera.png') }}" class="w-6 h-6">
            <span>Konfirmasi foto</span>
        </div>

        <!-- PREVIEW FOTO -->
        <div
            class="mt-4 flex-1 border-2 border-white rounded-[20px]
                   flex items-center justify-center bg-white/20"
        >
            <!-- Placeholder image -->
            <img src="{{ asset('images/preview-food.png') }}"
                 alt="Preview"
                 class="max-h-full max-w-full object-contain">
        </div>

        <!-- INFO -->
        <div class="mt-6 text-black space-y-2">
            <p class="font-semibold">Nama Makanan : <span class="font-bold">Bubur Ayam</span></p>

            <p class="font-semibold mt-3">Kandungan nutrisi dalam makanan :</p>
            <ul class="ml-4 space-y-1 text-sm">
                <li>Protein : 18 gram</li>
                <li>Karbohidrat : 300 gram</li>
                <li>Kalori : 500 gram</li>
                <li>Fat : 18%</li>
            </ul>
        </div>

        <!-- BUTTONS -->
        <div class="mt-6 flex justify-end gap-4">
            <!-- GANTI FOTO -->
            <button
                class="px-6 py-2 rounded-full bg-[#D98A85] text-white
                       hover:bg-[#C97B75] transition"
            >
                Ganti Foto
            </button>

            <!-- KONFIRMASI -->
            <button
                class="px-6 py-2 rounded-full bg-[#FF6A5E] text-white font-semibold
                       hover:bg-[#E8574C] transition"
            >
                Konfirmasi
            </button>
        </div>

    </div>
</div>
