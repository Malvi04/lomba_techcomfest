@extends('components.layouts.appassesment')

@section('content')
<div 
    x-data="{ step: 1 }"
    class="min-h-screen bg-[#FF6B5E] relative overflow-hidden"
>

    <!-- STEP 1 -->
    <section
        x-show="step === 1"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-1')
        <x-assesment.next @click="const v = document.getElementById('step_1_input').value;
        if (!v || isNaN(v) || !Number(v)) return alert('Umur harus di isi dengan valid.')
        step++;" />
    </section>

    <!-- STEP 2 -->
    <section
        x-show="step === 2"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-2')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="const v = document.getElementById('step_2_input').selectedIndex;
        if (!v) return alert('Mohon pilih opsi yang sesuai.')
        step++;" />
    </section>

    <!-- STEP 3 -->
    <section
        x-show="step === 3"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-3')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="const v = document.getElementById('step_3_input').value;
        if (!v || isNaN(v) || !Number(v)) return alert('Berat badan harus di isi dengan valid.')
        step++;" />
    </section>

    <!-- STEP 4 -->
    <section
        x-show="step === 4"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-4')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="const v = document.getElementById('step_4_input').value;
        if (!v || isNaN(v) || !Number(v)) return alert('Tinggi badan harus di isi dengan valid.')
        step++;" />
    </section>

    <!-- STEP 5 -->
    <section
        x-show="step === 5"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-5')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="const v = document.getElementById('step_5_input').selectedIndex;
        if (!v) return alert('Mohon pilih opsi yang sesuai.')
        step++;" />
    </section>

    <!-- STEP 6 -->
    <section
        x-show="step === 6"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-6')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="const v = document.getElementById('step_6_input').selectedIndex;
        if (!v) return alert('Mohon pilih opsi yang sesuai.')
        step++;" />
    </section>

    <!-- STEP 7 -->
    <section
        x-show="step === 7"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-7')
        <x-assesment.back @click="step--" />

        <!-- BUTTON SUBMIT FINAL -->
        <button
            onclick="complete_profile()"
            class="absolute bottom-10 right-10
                   text-white text-xl font-semibold
                   border border-white rounded-xl
                   px-8 py-3 hover:bg-white hover:text-[#FF6B5E] transition"
        >
            Selesai
        </button>
    </section>
</div>
<script>
        function getCookie(name) {
            return document.cookie
                .split('; ')
                .find(row => row.startsWith(name + '='))
                ?.split('=')[1];
        }

        async function complete_profile() {
            const step_1 = document.getElementById("step_1_input").value
            const step_2 = document.getElementById("step_2_input").selectedIndex
            const step_3 = document.getElementById("step_3_input").value
            const step_4 = document.getElementById("step_4_input").value
            const step_5 = document.getElementById("step_5_input").selectedIndex
            const step_6 = document.getElementById("step_6_input").selectedIndex
            const step_7 = document.getElementById("step_7_input").selectedIndex

            if (!step_7) return alert("Mohon pilih opsi yang sesuai.");

            const xsrf = getCookie('XSRF-TOKEN');

            const res = await fetch('/complete_profile', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-XSRF-TOKEN': decodeURIComponent(xsrf)
                },
                body: new URLSearchParams({
                    step_1, step_2, step_3, step_4, step_5, step_6, step_7
                })
            });

            const res_json = await res.json();

            if (res_json["status"]) {
                window.location.replace("/dashboard")
            }
        }
    </script>
@endsection
