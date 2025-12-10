@extends('components.layouts.app')

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
        <x-assesment.next @click="step++" />
    </section>

    <!-- STEP 2 -->
    <section
        x-show="step === 2"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-2')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="step++" />
    </section>

    <!-- STEP 3 -->
    <section
        x-show="step === 3"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-3')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="step++" />
    </section>

    <!-- STEP 4 -->
    <section
        x-show="step === 4"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-4')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="step++" />
    </section>

    <!-- STEP 5 -->
    <section
        x-show="step === 5"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-5')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="step++" />
    </section>

    <!-- STEP 6 -->
    <section
        x-show="step === 6"
        x-transition
        class="min-h-screen flex items-center justify-center"
    >
        @include('assesment.step-6')
        <x-assesment.back @click="step--" />
        <x-assesment.next @click="step++" />
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
        <div
            class="absolute bottom-10 right-10
                   text-white text-xl font-semibold
                   border border-white rounded-xl
                   px-8 py-3 hover:bg-white hover:text-[#FF6B5E] transition"
        >
            Selesai
        </div>
    </section>

</div>
@endsection
