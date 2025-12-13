<x-layouts.appdashboard title="Dashboard">

<div x-data="{ photoOpen: false }" id="popup"
x-on:open-photo.window="photoOpen = true">

    <!-- PAGE WRAPPER -->
    <div class="min-h-screen bg-gradient-to-b from-[#E9A39A] to-[#C98C7E] p-8 text-white">

        <!-- TOP BAR -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/icons/profile.png') }}" class="w-10 h-10">
                <span class="font-semibold">Halo, {{ $user->username }}!</span>
            </div>
            <form method="GET" action=/logout>
            @csrf
            <button
                type="submit"
                class="px-6 py-2 bg-white/20 text-white font-semibold rounded-xl
                    hover:bg-white/30 transition"
            >
                Logout
            </button>
        </form>
        </div>

        <!-- PROGRESS CARD -->
        <div class="bg-gradient-to-r from-[#FF6A5E] to-[#FF4D4D] rounded-3xl p-6 flex items-center justify-between mb-8">

            <div class="w-2/3">
                <div class="flex items-center gap-2 mb-3">
                    <img src="{{ asset('images/icons/progres.png') }}" class="w-5">
                    <p class="font-semibold">Progress Kamu</p>
                </div>

                <div class="grid grid-cols-3 gap-6 text-sm mb-3">
                    <p>Protein<br>
                        <b>{{ rtrim(rtrim($user->current_protein, '0'), '.') }}g</b> / <b>{{ rtrim(rtrim($user->limit_protein, '0'), '.') }}g</b>
                    </p>
                    <p>Karbo<br>
                        <b>{{ rtrim(rtrim($user->current_karbo, '0'), '.') }}g</b> / <b>{{ rtrim(rtrim($user->limit_karbo, '0'), '.') }}g</b>
                    </p>
                    <p>Kalori<br>
                        <b>{{ rtrim(rtrim($user->current_kalori, '0'), '.') }}g</b> / <b>{{ rtrim(rtrim($user->limit_kalori, '0'), '.') }}g</b>
                    </p>
                </div>

                <div class="relative w-full h-4 bg-white/50 rounded-full overflow-hidden">
                    <div id="control_bar_1" class="absolute left-0 top-0 h-full w-[0%] bg-white rounded-full"></div>
                </div>
                <p id="persen_1" class="text-center mt-1 text-sm">0%</p>
            </div>

            <div class="relative w-24 h-24">
                <svg class="w-24 h-24 transform -rotate-90">
                    <!-- background circle -->
                    <circle
                        cx="48" cy="48" r="36"
                        stroke="rgba(0,0,0,0.25)"
                        stroke-width="8"
                        fill="none"
                    />

                    <!-- progress circle -->
                    <circle
                        id="progress_circle"
                        cx="48" cy="48" r="36"
                        stroke="#fff"
                        stroke-width="8"
                        fill="none"
                        stroke-dasharray="226"
                        stroke-dashoffset="226"
                        stroke-linecap="round"
                        class="transition-all duration-700 ease-out"
                    />
                </svg>

                <!-- text di tengah -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <span id="persen_2" class="text-xl font-bold">0%</span>
                </div>
            </div>


        </div>

        <!-- NUTRITION -->
        <div class="grid grid-cols-3 gap-6 mb-8">

            <!-- SLEEP -->
            <a href="/sleep-tracker"
            @click.prevent="
                leaving = true;
                setTimeout(() => window.location.href = $el.href, 300)
            "
            class="bg-[#FF6A5E] rounded-2xl p-5 h-24
                    flex items-center justify-center transition
                    h-24 transition hover:scale-[1.02]">
                <img src="{{ asset('images/icons/tidur.png') }}" class="w-10">
            </a>

            <!-- ACTIVITY -->
            <a href="#"
            class="bg-[#FF6A5E] rounded-2xl p-5
                    flex items-center justify-center
                    h-24 transition hover:scale-[1.02]">
                <img src="{{ asset('images/icons/run.png') }}" class="w-10">
            </a>

            <!-- TIPS -->
            <a href="#"
            class="bg-[#FF6A5E] rounded-2xl p-5
                    flex items-center justify-center
                    h-24 transition hover:scale-[1.02]">
                <img src="{{ asset('images/icons/ide.png') }}" class="w-10">
            </a>

        </div>


        <!-- FOOD LOG -->
        <div class="mb-6">
            <p>Ini adalah catatan makanan kamu: </p>
            <p class="font-semibold">Hi, {{ $user->full_name }}</p>
            <p>Mau makan apa hari ini?</p>
        </div>

        <div id="item-makanan">
            
        </div>

        <button class="border border-white/70 rounded-full py-4 w-full mb-6 flex flex-col items-center gap-3 hover:bg-white/10 transition" onclick="add_food_manual()">
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
                id="upload_foto_button"
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
            <!-- FIXED PREVIEW BOX -->
            <div class="w-full h-full max-h-[360px] max-w-full overflow-hidden rounded-xl flex items-center justify-center">
                <img
                    id="image_food_preview"
                    alt="Preview"
                    class="max-w-full max-h-full object-contain"
                >
            </div>
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
                id="ganti_foto_button"
                type="button"
                @click="$refs.uploadFoto.click()"
                class="px-6 py-2 rounded-full bg-[#D98A85] text-white
                    hover:bg-[#C97B75] transition"
            >
                Ganti Foto
            </button>

            <button
                onclick="add_food_photo()"
                id="konfirmasi_button"
                class="px-6 py-2 rounded-full bg-[#FF6A5E] text-white font-semibold
                    hover:bg-[#E8574C] transition"
            >
                Konfirmasi
            </button>
        </div>
    </div>
</div>
<script>
const current_protein = {{ $user->current_protein }};
const current_karbo = {{ $user->current_karbo }};
const current_kalori = {{ $user->current_kalori }};
const limit_protein = {{ $user->limit_protein }};
const limit_karbo = {{ $user->limit_karbo }};
const limit_kalori = {{ $user->limit_kalori }};
const food_today = @json($user->food_today);

let current_scan_food = null;

function generateRandomString(length) {
    const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '';

    for (let i = 0; i < length; i++) {
        result += chars.charAt(Math.floor(Math.random() * chars.length));
    }

    return result;
}

function toPercent(value, limit) {
    if (!limit || limit === 0) return 0;
    let p = (value / limit) * 100;
    return Math.min(p, 100); // biar ga lewat 100%
}

function getCookie(name) {
    return document.cookie
        .split('; ')
        .find(row => row.startsWith(name + '='))
        ?.split('=')[1];
}

async function add_food_manual() {
    const name = prompt("Masukkan nama makanan yang ingin ditambahkan");
    if (!name) return;

    const xsrf = getCookie('XSRF-TOKEN');
    if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

    const res = await fetch('/get_food', {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-XSRF-TOKEN': decodeURIComponent(xsrf)
        },
        body: new URLSearchParams({ name }).toString()
    });
    
    const res_json = await res.json();
    if (res_json["status"] === false) return alert("Error: " + res_json["message"]);
    
    if (confirm(`Makanan terdeteksi: ${res_json.result[0].name_target}\nKalori: ${res_json.result[0].calories}g\nProtein: ${res_json.result[0].proteins}g\nKarbo: ${res_json.result[0].carbohydrate}g\n\nApakah anda ingin menambahkan makanan ini?`)) {
        const xsrf = getCookie('XSRF-TOKEN');
        if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

        res_json.result[0].id = generateRandomString(32);
        delete res_json.result[0].name_alias;

        const res = await fetch('/add_food_to_db', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': decodeURIComponent(xsrf)
            },
            body: JSON.stringify({
                food: {
                    result: res_json.result,
                    total_kalori: res_json.result[0].calories,
                    total_protein: res_json.result[0].proteins,
                    total_karbohidrat: res_json.result[0].carbohydrate
                }
            })
        });
        
        window.location.reload();
    }
}

async function delete_food(id) {
    if (confirm(`Apakah anda yakin untuk menghapus makanan ini?`)) {
        const xsrf = getCookie('XSRF-TOKEN');
        if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

        const res = await fetch('/delete_food', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-XSRF-TOKEN': decodeURIComponent(xsrf)
            },
            body: new URLSearchParams({ id }).toString()
        });

        window.location.reload();
    }
}

async function edit_food(id) {
    const name = prompt("Masukan nama makanan");
    if (!name) return;

    const xsrf = getCookie('XSRF-TOKEN');
    if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

    const res = await fetch('/get_food', {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-XSRF-TOKEN': decodeURIComponent(xsrf)
        },
        body: new URLSearchParams({ name }).toString()
    });

    const res_json = await res.json();

    if (res_json["status"] === false) return alert("Error: " + res_json["message"]);

    if (confirm(`Makanan terdeteksi: ${res_json.result[0].name_target}\nKalori: ${res_json.result[0].calories}g\nProtein: ${res_json.result[0].proteins}g\nKarbo: ${res_json.result[0].carbohydrate}g\n\nApakah anda ingin mengedit menjadi makanan ini?`)) {
        const xsrf = getCookie('XSRF-TOKEN');
        if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

        res_json.result[0].id = id;
        delete res_json.result[0].name_alias;

        const res = await fetch('/edit_food', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': decodeURIComponent(xsrf)
            },
            body: JSON.stringify({
                id,
                result: res_json.result
            })
        });
        
        window.location.reload();
    }
}

async function add_food_photo() {
    if (!current_scan_food) return;

    current_scan_food.result = current_scan_food.result.filter(item => item !== null)
    const xsrf = getCookie('XSRF-TOKEN');
    if (!xsrf) throw new Error('XSRF-TOKEN cookie tidak ditemukan');

    const res = await fetch('/add_food_to_db', {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
            'X-XSRF-TOKEN': decodeURIComponent(xsrf)
        },
        body: JSON.stringify({ food: current_scan_food })
    });

    document.getElementById("upload_image_result").style = "display: none;";

    window.location.reload();
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

        current_scan_food = null;
        document.getElementById("ganti_foto_button").disabled = true;
        document.getElementById("upload_foto_button").disabled = true;
        document.getElementById("konfirmasi_button").disabled = true;

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
            delete item.name_alias;
            item.id = generateRandomString(32);
            res_food.push(item.name_target)
            total_kalori += Number(item.calories);
            total_protein += Number(item.proteins);
            total_karbohidrat += Number(item.carbohydrate);
        });

        current_scan_food = {
            result: json.result,
            total_kalori, total_protein, total_karbohidrat
        };

        document.getElementById("ganti_foto_button").disabled = false;
        document.getElementById("upload_foto_button").disabled = false;
        document.getElementById("konfirmasi_button").disabled = false;

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
        document.getElementById("ganti_foto_button").disabled = false;
        document.getElementById("upload_foto_button").disabled = false;
        document.getElementById("konfirmasi_button").disabled = false;
        console.error(err);
        alert('Upload gagal! mohon kirim gambar yang valid.');
      }
    }
  }
}
(function() {
    const percent_protein = toPercent(current_protein, limit_protein);
    const percent_karbo = toPercent(current_karbo, limit_karbo);
    const percent_kalori = toPercent(current_kalori, limit_kalori);
    let total_percent = (percent_protein + percent_karbo + percent_kalori) / 3;
    total_percent = Math.min(Math.round(total_percent), 100);

    document.getElementById("persen_1").innerHTML = `${total_percent}%`
    document.getElementById("persen_2").innerHTML = `${total_percent}%`
    document.getElementById("control_bar_1").style.width = `${total_percent}%`;

    const circle = document.getElementById("progress_circle");
    const radius = 36;
    const circumference = 2 * Math.PI * radius;

    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset =
        circumference - (total_percent / 100) * circumference;

    if (food_today.length != 0 && food_today[0].length != 0) {
        document.getElementById("item-makanan").insertAdjacentHTML("beforeend",  `<div class="px-6 py-3 flex items-center justify-between text-white text-sm border-b border-white/40 mb-4">
            <span class="w-1/3 font-semibold">Nama Makanan</span>
                <div class="flex gap-10">
                    <span class="font-semibold">Kalori</span>
                    <span class="font-semibold">Protein</span>
                    <span class="font-semibold">Karbo</span>
                </div>
                <span class="w-[80px] text-right font-semibold">Aksi</span>
            </div>
        `);
        food_today.forEach(item => {
            document.getElementById("item-makanan").insertAdjacentHTML("beforeend", `
                <div class="border border-white/70 rounded-full px-6 py-4 flex justify-between mb-4 text-white">
                    <p class="w-1/3 capitalize">${item.name_target}</p>

                    <div class="flex gap-10 text-sm">
                        <span>${item.calories}g</span>
                        <span>${item.proteins}g</span>
                        <span>${item.carbohydrate}g</span>
                    </div>

                    <div class="flex gap-2 w-[80px] justify-end">
                        <button class="px-2 py-1 rounded-full border border-white/50 hover:bg-white/20 text-xs" onclick="edit_food('${item.id}')">
                            Edit
                        </button>
                        <button class="px-2 py-1 rounded-full border border-red-400 text-red-300 hover:bg-red-400/20 text-xs" onclick="delete_food('${item.id}')">
                            Hapus
                        </button>
                    </div>
                </div>
            `);
        });
    }

    
})()

    
</script>
</x-layouts.appdashboard>
