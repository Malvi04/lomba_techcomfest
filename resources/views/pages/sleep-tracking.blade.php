<x-layouts.app :noPadding="true">

<div class="min-h-screen bg-gradient-to-b from-[#DD8680] to-[#C97971] text-white px-6 py-10"
     x-data="sleepTracker()">

    <!-- USER -->
    <div class="flex items-center gap-2 mb-4">
        <div class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center">
            <img src="{{ Vite::asset('resources/images/dashboard/profile.png') }}" class="w-4">
        </div>
        <span class="text-sm">{{ $user->username }}</span>
    </div>

    <!-- TITLE -->
    <h1 class="text-center font-semibold mb-1">
        Jam waktu tidur kamu sebelumnya :
    </h1>

    <!-- STATUS -->
    @if ($user->waktu_tidur === 1)
        <h2 class="text-center text-2xl font-bold text-green-200 flex items-center justify-center gap-1">
            Bagus <span>✅</span>
        </h2>

        <!-- SUGGESTION -->
        <p class="text-center text-sm mt-2">
            Pertahankan jadwal tidur yang baik! Terus jaga konsistensi waktu tidurmu.
        </p>
    @elseif ($user->waktu_tidur === 2)
        <h2 class="text-center text-2xl font-bold text-red-200 flex items-center justify-center gap-1">
            Buruk <span>⚠️</span>
        </h2>

        <!-- SUGGESTION -->
        <p class="text-center text-sm mt-2">
            Perbaiki jam tidurmu! Setidaknya 30 menit lebih awal terlebih dahulu
        </p>
    @else
        <h2 class="text-center text-2xl font-bold text-gray-300 flex items-center justify-center gap-1">
            Belum Ada Data <span>❓</span>
        </h2>

        <!-- SUGGESTION -->
        <p class="text-center text-sm mt-2">
            Lengkapi assessment untuk mendapatkan saran tidur yang tepat.
        </p>
    @endif

    <!-- CIRCLE PROGRESS -->
    <div class="flex justify-center my-8">
        <div class="relative">
            <svg class="w-48 h-48 transform -rotate-90">
                <circle cx="96" cy="96" r="80" stroke="#7A0C00" stroke-width="15" fill="none" />
                <circle cx="96" cy="96" r="80" stroke="#FF6A5E" stroke-width="15" fill="none"
                    stroke-dasharray="502"
                    stroke-dashoffset="502"
                    class="transition-all duration-500"
                />
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
                <p class="text-3xl font-bold">0%</p>
            </div>
        </div>
    </div>

    <!-- SET SLEEP TIME -->
    <h3 class="text-center text-xl font-bold mb-4">
        Atur waktu tidur malam ini
    </h3>

    <div class="flex justify-center items-center gap-4">

<!-- HOUR -->
    <div class="flex flex-col items-center">
        <button @click="hour = (hour + 1) % 24" class="text-3xl">▲</button>

        <input 
            type="number"
            x-model.number="hour"
            @input="hour = Math.max(0, Math.min(hour, 23))"
            class="bg-white text-black px-6 py-3 rounded-xl text-4xl font-bold text-center w-24 no-spinner"
            min="0" max="23"
        >

        <button @click="hour = (hour - 1 + 24) % 24" class="text-3xl">▼</button>
    </div>

    <span class="text-4xl font-bold mx-4">:</span>

    <!-- MINUTE -->
    <div class="flex flex-col items-center">
        <button @click="minute = (minute + 1) % 60" class="text-3xl">▲</button>

        <input 
            type="number"
            x-model.number="minute"
            @input="minute = Math.max(0, Math.min(minute, 59))"
            class="bg-white text-black px-6 py-3 rounded-xl text-4xl font-bold text-center w-24 no-spinner"
            min="0" max="59"
        >

        <button @click="minute = (minute - 1 + 60) % 60" class="text-3xl">▼</button>
    </div>
    
    
</div>

<!-- SAVE BUTTON -->
    <div class="flex justify-center mt-6">
        <button 
            @click="saveSleepTime()"
            :disabled="loading"
            class="px-8 py-3 bg-white text-[#C97971] font-bold rounded-xl shadow hover:bg-gray-200 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <span x-show="!loading">Simpan Waktu Tidur</span>
            <span x-show="loading">Menyimpan...</span>
        </button>
    </div>

    <!-- HISTORY -->
    <div class="text-center mt-10">
        <p class="font-semibold text-lg">Riwayat Jam Tidur</p>
        @forelse ($records as $record)
            <div class="flex items-center justify-between mt-4 px-10">

                <span class="font-bold">
                    {{ \Carbon\Carbon::parse($record->date)->translatedFormat('l') }}
                </span>

                <p>
                    Tidur: <b>{{ $record->sleep_time }}</b>
                </p>

                @if ($record->wake_time === null)
                    <button
                        type="button"
                        @click="wakeUp({{ $record->id }})"
                        :disabled="loading"
                        class="px-6 py-2 bg-[#A75F59] rounded-xl font-bold hover:bg-[#8B4D44] transition disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span x-show="!loading">Bangun</span>
                        <span x-show="loading">Memproses...</span>
                    </button>
                @else
                    <span class="text-sm opacity-70">
                        Bangun: <b>{{ \Carbon\Carbon::parse($record->wake_time)->format('H:i') }}</b>
                    </span>
                @endif

            </div>
        @empty
            <p class="text-sm opacity-80">Belum ada data</p>
        @endforelse
    </div>

    <!-- DASHBOARD BUTTON -->
    <div class="flex justify-center mt-12">
        <a href="/dashboard"
           class="px-8 py-3 bg-white/20 text-white font-semibold rounded-xl backdrop-blur">
            Dashboard
        </a>
    
    </div>
    
</div>
<script>
function sleepTracker() {
    return {
        // state
        hour: 22,
        minute: 0,
        loading: false,

        // simpan jam tidur
        async saveSleepTime() {
            this.loading = true;
            try {
                const response = await fetch('/sleep/save', {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        hour: this.hour,
                        minute: this.minute
                    })
                });

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'Gagal simpan');
                }

                const data = await response.json();
                console.log('Sleep time saved:', data);
                alert('Waktu tidur berhasil disimpan!');
                setTimeout(() => location.reload(), 500);
            } catch (err) {
                console.error('Error:', err);
                alert('Gagal menyimpan waktu tidur: ' + err.message);
            } finally {
                this.loading = false;
            }
        },

        // tombol bangun
        async wakeUp(id) {
            if (!confirm('Apakah kamu yakin ingin bangun sekarang?')) return;
            
            this.loading = true;
            try {
                const response = await fetch('/sleep/wake', {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ id: id })
                });

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'Gagal bangun');
                }

                const data = await response.json();
                console.log('Wake time saved:', data);
                alert('Waktu bangun berhasil disimpan!');
                setTimeout(() => location.reload(), 500);
            } catch (err) {
                console.error('Error:', err);
                alert('Gagal menyimpan waktu bangun: ' + err.message);
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>
</x-layouts.app>
