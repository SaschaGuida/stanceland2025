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

    {{-- SECONDO VIDEO COLLEZIONE ABBIGLIAMENTO --}}
<section class="w-full mt-24">
    <div class="w-full h-[250px] overflow-hidden">
        <video class="w-full h-full object-cover" autoplay muted loop>
            <source src="/img/video/video-2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

    {{-- CAROSELLO FOTO EVENTI --}}
    <div id="default-carousel" class="relative w-full mt-20" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/img/gallery_home/B1.jpeg" class="absolute block w-full " alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/img/gallery_home/B2.jpeg" class="absolute block w-full " alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/img/gallery_home/B3.jpeg" class="absolute block w-full" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/img/gallery_home/B4.jpeg" class="absolute block w-full " alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/img/gallery_home/b12.jpeg" class="absolute block w-full " alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- SEZIONE FOTO ABBIGLIAMENTO --}}
    <div class="mt-20">
        <h2 class="text-3xl font-bold text-center mb-8">Discover the new collection</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 mt-10">
            <div class="grid">
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B1.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B2.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B3.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B4.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/b8.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/b12.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B13.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/c1.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/c2.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B1.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B1.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-auto max-w-full" src="/img/gallery_home/B1.jpeg" alt="">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <p class="text-white text-xl mb-4">Sample Text</p>
                        <a href="https://tuo-link.com"
                            class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 mt-2 transition-colors">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection