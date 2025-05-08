@extends('components.layout-main')

@section('content')

    <!-- Video Fullscreen per Desktop -->
    <div class="relative w-full h-dvh">
        <!-- Video visibile solo su dispositivi desktop (xl e superiori) -->
        <video class="w-full h-full object-cover hidden xl:block" autoplay muted loop>
            <source src="/img/video/SL.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Immagine per dispositivi tablet e mobile -->
        <img class="w-full h-screen object-cover hidden xl:hidden md:block" src="/img/sl_tablet.jpeg" alt="Tablet Image">

        <!-- Immagine per dispositivi mobili (sm e inferiori) -->
        <img class="w-full h-screen object-cover md:hidden" src="/img/sl_mobile.jpeg" alt="Mobile Image">

        <!-- Contenuti Sovrapposti (testo e immagini) visibili solo su dispositivi mobile e tablet -->
        <div class="absolute inset-0 flex items-center justify-center text-center text-white xl:hidden">
            <div>
                <h1 class="text-4xl sm:text-5xl font-bold mb-4">Welcome to Stanceland</h1>
                <p class="text-xl mb-8">A STYLE THAT NOT EVERYONE CAN UNDERSTAND, BUT FEW KNOW HOW TO CARRY</p>
            </div>
        </div>

    </div>

    <!-- Sezione con le Foto Sotto il Video -->
    {{-- <div class="container mx-auto py-16">
        <h2 class="text-3xl font-bold text-center mb-8">Discover the new collection</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="">
                <img class="w-full h-64 object-cover rounded" src="/img/gallery_home/B1.jpeg" alt="Project 1">
            </div>
            <div class="">
                <img class="w-full h-64 object-cover rounded" src="/img/gallery_home/B2.jpeg" alt="Project 2">
            </div>
            <div class="">
                <img class="w-full h-full object-cover rounded" src="/img/gallery_home/B3.jpeg" alt="Project 3">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
            <div class="">
                <img class="w-full h-64 object-cover rounded" src="/img/gallery_home/B3.jpeg" alt="Project 1">
            </div>
            <div class="">
                <img class="w-full h-64 object-cover rounded" src="/img/gallery_home/B4.jpeg" alt="Project 2">
            </div>
            <div class="">
                <img class="w-full h-64 object-cover rounded" src="/img/gallery_home/b8.jpeg" alt="Project 3">
            </div>
        </div>
    </div> --}}




<div class="grid grid-cols-2 gap-2">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
        </div>
    </div>


    <div class="mt-20">

        <h2 class="text-3xl font-bold text-center mb-8">Discover the new collection</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B2.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B3.jpeg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B4.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/b8.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/b12.jpeg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B13.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/c1.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/c2.jpeg" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="/img/gallery_home/B1.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>


@endsection

{{-- test1fffff--}}