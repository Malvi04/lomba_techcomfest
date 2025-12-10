<x-layouts.appdashboard title="Dashboard">

<div x-data="{ photoOpen: false }" id="popup"
x-on:open-photo.window="photoOpen = true">

    <!-- PAGE WRAPPER -->
    <div class="min-h-screen bg-gradient-to-b from-[#E9A39A] to-[#C98C7E] p-8 text-white">

        <!-- TOP BAR -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/icons/user.png') }}" class="w-10 h-10">
                <span class="font-semibold">Halo, {{ $user->username }}!</span>
            </div>
            <img src="{{ asset('images/icons/setting.png') }}" class="w-8 h-8">
        </div>

        <!-- PROGRESS CARD -->
        <div class="bg-gradient-to-r from-[#FF6A5E] to-[#FF4D4D] rounded-3xl p-6 flex items-center justify-between mb-8">

            <div class="w-2/3">
                <div class="flex items-center gap-2 mb-3">
                    <img src="{{ asset('images/icons/chart.png') }}" class="w-5">
                    <p class="font-semibold">Progress Kamu</p>
                </div>

                <div class="grid grid-cols-3 gap-6 text-sm mb-3">
                    <p>Protein<br>
                        <b>{{ rtrim(rtrim($user->current_protein, '0'), '.') }} g</b> / <b>{{ rtrim(rtrim($user->limit_protein, '0'), '.') }}g</b>
                    </p>
                    <p>Karbo<br>
                        <b>{{ rtrim(rtrim($user->current_karbo, '0'), '.') }} g</b> / <b>{{ rtrim(rtrim($user->limit_karbo, '0'), '.') }}g</b>
                    </p>
                    <p>Kalori<br>
                        <b>{{ rtrim(rtrim($user->current_kalori, '0'), '.') }} g</b> / <b>{{ rtrim(rtrim($user->limit_kalori, '0'), '.') }}g</b>
                    </p>
                </div>

                <div class="relative w-full h-4 bg-white/50 rounded-full overflow-hidden">
                    <div class="absolute left-0 top-0 h-full w-[70%] bg-white rounded-full"></div>
                </div>
                <p class="text-center mt-1 text-sm">70%</p>
            </div>

            <div class="w-24 h-24 rounded-full border-[10px] border-red-900/40 flex items-center justify-center">
                <span class="text-xl font-bold">70%</span>
            </div>

        </div>

        <!-- NUTRITION -->
        <p class="mb-4 text-lg font-semibold">Nutrisi yang harus kamu penuhi hari ini :</p>

        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="bg-gradient-to-b from-[#FF6A5E] to-[#FF4D4D] rounded-2xl p-5">
            <p class="font-semibold mb-3">Protein · Karbo · Kalori</p>
                <p>
                    {{ rtrim(rtrim($user->limit_protein, '0'), '.') }}g · 
                    {{ rtrim(rtrim($user->limit_karbo, '0'), '.') }}g · 
                    {{ rtrim(rtrim($user->limit_kalori, '0'), '.') }}g
                </p>
            </div>
            <div class="bg-[#FF6A5E] rounded-2xl p-5 flex justify-between items-center">
                <img src="{{ asset('images/icons/bed.png') }}" class="w-10">
                <span>→</span>
            </div>

            <div class="bg-[#FF6A5E] rounded-2xl p-5 flex justify-between items-center">
                <img src="{{ asset('images/icons/run.png') }}" class="w-10">
                <span>→</span>
            </div>

            <div class="bg-[#FF6A5E] rounded-2xl p-5 flex justify-between items-center">
                <img src="{{ asset('images/icons/lamp.png') }}" class="w-10">
                <span>→</span>
            </div>
        </div>

        <!-- FOOD LOG -->
        <div class="mb-6">
            <p>Ini adalah catatan makanan kamu: </p>
            <p class="font-semibold">Hi, {{ $user->full_name }}</p>
            <p>Mau makan apa hari ini?</p>
        </div>

        <div class="border border-white/70 rounded-full px-6 py-4 flex justify-between mb-4">
            <p>Rendang</p>
            <div class="flex gap-10 text-sm">
                <span>25g</span>
                <span>25g</span>
                <span>25g</span>
            </div>
        </div>
        <div class="border border-white/70 rounded-full px-6 py-4 flex justify-between mb-4">
            <p>Rendang</p>
            <div class="flex gap-10 text-sm">
                <span>25g</span>
                <span>25g</span>
                <span>25g</span>
            </div>
        </div>

        <button class="border border-white/70 rounded-full py-4 w-full mb-6">
            + Tambah Makanan
        </button>

        <!-- UPLOAD PHOTO BUTTON -->
        <div x-data="upload_photo_food()">

            <input 
                type="file"
                x-ref="uploadFoto"
                accept="image/*"
                class="hidden"
                @change="onFile"
            />

            <button
                type="button"
                @click="$refs.uploadFoto.click()"
                class="w-full border-2 border-dashed border-white/70 rounded-3xl p-16
                    flex flex-col items-center gap-3 hover:bg-white/10 transition"
            >
                <img src="{{ Vite::asset('resources/images/icons/camera.png') }}" class="w-20">
                <p class="font-medium">+ Tambahkan dengan foto (Max: 2MB)</p>
            </button>

        </div>


        <div class="flex justify-end mt-6">
            <span class="flex items-center gap-2 cursor-pointer">
                Yuk lihat tips lainnya →
            </span>
        </div>

    </div>


    @include('popup.photoUploadPopup')

    <div
    x-transition.opacity
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" style="display: none;" id="upload_image_result"
>
    <div class="w-[681px] h-[683px] bg-gradient-to-b from-[#D88E86] to-[#F2C1BB]
                rounded-[28px] shadow-xl p-6 flex flex-col justify-between">

        <div class="flex items-center justify-between text-white font-semibold text-lg">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/icons/camera.png') }}" class="w-6 h-6">
                <span>Konfirmasi foto</span>
            </div>
            
            <button
                class="text-white hover:text-gray-200 transition"
                onclick="document.getElementById('upload_image_result').style.display='none'"
                aria-label="Tutup"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div
            class="mt-4 flex-1 border-2 border-white rounded-[20px]
                flex items-center justify-center bg-white/20"
        >
            <div class="overflow-hidden rounded-xl"><img
                alt="Preview"
                class="w-full h-full object-contain block"
                id="image_food_preview"
            ></div>
        </div>

        <div class="mt-2 text-black space-y-2">
            <p class="font-semibold">Makanan yang terdeteksi: <span class="font-bold" id="nama_makanan">undefined</span></p>

            <p class="font-semibold mt-3">Kandungan nutrisi dalam makanan</p>
            <ul class="ml-4 space-y-1 text-sm">
                <li id="total_protein">Protein: 0g</li>
                <li id="total_karbohidrat">Karbohidrat: 0g</li>
                <li id="total_kalori">Kalori: 0g</li>
            </ul>
        </div>

        <div class="mt-6 flex justify-end gap-4">
            <div x-data="upload_photo_food()">

            <input 
                type="file"
                x-ref="uploadFoto"
                accept="image/*"
                class="hidden"
                @change="onFile"
            />
            <button
                type="button"
                @click="$refs.uploadFoto.click()"
                class="px-6 py-2 rounded-full bg-[#D98A85] text-white
                    hover:bg-[#C97B75] transition"
            >
                Ganti Foto
            </button>

            <button
                class="px-6 py-2 rounded-full bg-[#FF6A5E] text-white font-semibold
                    hover:bg-[#E8574C] transition"
            >
                Konfirmasi
            </button>
        </div>

    </div>
</div>


</div>
<script>
    // helper buat baca cookie
function getCookie(name) {
    return document.cookie
        .split('; ')
        .find(row => row.startsWith(name + '='))
        ?.split('=')[1];
}

async function add_food_photo(foodArray) {
  const xsrf = getCookie('XSRF-TOKEN');
  if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

  const res = await fetch('/add_food_to_db', {
    method: 'POST',
    credentials: 'same-origin',
    headers: {
      'Content-Type': 'application/json',
      'X-XSRF-TOKEN': decodeURIComponent(xsrf)
    },
    body: JSON.stringify({ food: foodArray })
  });

  return res.json();
}

function upload_photo_food() {
  return {
    file: null,
    preview: null,
    maxBytes: 2 * 1024 * 1024, // contoh: 2MB sebelum encoding

    onFile(e) {
      const f = e.target.files[0];
      if (!f) return;

      if (!f.type.startsWith('image/')) {
        alert('Pilih file gambar!');
        e.target.value = '';
        return;
      }

      if (f.size > this.maxBytes) {
        alert('Maksimal file ' + (this.maxBytes/1024/1024) + 'MB.');
        e.target.value = '';
        return;
      }

      this.file = f;
      this.preview = URL.createObjectURL(f);

      const reader = new FileReader();
      reader.onload = () => {
        const dataUrl = reader.result;
        this.sendBase64(dataUrl.split(',')[1], f.name, reader.result);
      };
      reader.readAsDataURL(f);
    },

    async sendBase64(dataUrl, filename, read) {
      try {
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        const res = await fetch('/api/predict_image', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            ...(token ? {'X-CSRF-TOKEN': token} : {})
          },
          body: new URLSearchParams({
            "image": dataUrl
          })
        });

        const json = await res.json();

        let total_kalori = 0;
        let total_protein = 0;
        let total_karbohidrat = 0;
        let res_food = []

        json.result.forEach(item => {
            if (!item || item.calories === null || item.proteins === null || item.carbohydrate === null) return;
            res_food.push(item.name_target)
            total_kalori += Number(item.calories);
            total_protein += Number(item.proteins);
            total_karbohidrat += Number(item.carbohydrate);
        });

        if (!res_food.length || res_food[0] === "unknown") return alert("Gambar ini bukan makanan. Tolong upload gambar yang valid.")

        let str;
        if (res_food.length > 1) {
            str = res_food.slice(0, -1).join(', ') + ' dan ' + res_food[res_food.length - 1];
        } else {
            str = res_food[0] ?? '';
        }

        document.getElementById("image_food_preview").src = read;
        document.getElementById("nama_makanan").innerHTML = str;
        document.getElementById("total_protein").innerHTML = `Protein: ${total_protein.toFixed(2)}g`
        document.getElementById("total_kalori").innerHTML = `Kalori: ${total_kalori.toFixed(2)}g`
        document.getElementById("total_karbohidrat").innerHTML = `Karbohidrat: ${total_karbohidrat.toFixed(2)}g`
        document.getElementById("upload_image_result").style = "";
      } catch (err) {
        console.error(err);
        alert('Upload gagal! mohon kirim gambar yang valid.');
      }
    }
  }

}
</script>
</x-layouts.appdashboard>
