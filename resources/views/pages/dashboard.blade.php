<x-layouts.appdashboard title="Dashboard">

<div x-data="{ photoOpen: false }">

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
                <span>13%</span>
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

    @include('pages.photoUploadPopup')

</div>
<script>
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

      // optional: ukuran sebelum base64
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
        this.sendBase64(dataUrl.split(',')[1], f.name);
      };
      reader.readAsDataURL(f);
    },

    async sendBase64(dataUrl, filename) {
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
        if (!res.ok) throw json;
        console.log('Upload sukses', json);
        alert('Upload sukses!');
      } catch (err) {
        console.error(err);
        alert('Upload gagal. Lihat console.');
      }
    }
  }
}
</script>

</x-layouts.app>
