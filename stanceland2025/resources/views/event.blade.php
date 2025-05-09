@extends('components.layout-main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 space-y-16">

        {{-- Riga 1: Immagine a sinistra, testo a destra --}}
        <div class="grid md:grid-cols-2 items-center ">
            <div>
                <img src="{{ asset('/img/eventi/eventonord.jpg') }}" alt="EVENTO NORD"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
            </div>
            <div class="space-y-4">
                <p class="text-sm uppercase tracking-widest text-fontcolor">26.04.2025</p>
                <h2 class="text-3xl font-semibold">STANCELAND THE NOBLE</h2>
                <p class="text-fontcolor">
                    For vehicles up to model year 2000. Passion for classic cars and motorcycles: An event where
                    vehicles from the last century are celebrated in a historic motorcycle environment. Surrounded by old
                    brick buildings, we create a unique and very special atmosphere.
                </p>
                <div class="space-y-1">
                    <p class="underline">Car apply until 20.4.2025</p>
                    <p><a href="#" class=" text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">Tickets</a></p>
                </div>
                <a href="{{ route('events.eventonord')}}" class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">Info</a>
            </div>
        </div>

        {{-- Riga 2: Testo a sinistra, immagine a destra --}}
        <div class="grid md:grid-cols-2 items-center ">
            <div class="space-y-4 order-2 md:order-1">
                <p class="text-sm uppercase tracking-widest text-fontcolor">01.09.2025</p>
                <h2 class="text-3xl font-semibold">STANCELAND - CEPRANO</h2>
                <p class="text-fontcolor">
                    The fantastic location of Oberhof in the middle of the Thuringian Forest offers an incomparable
                    atmosphere. The biathlon stadium is very spacious at around 10 kilometers long, but don’t worry: we are
                    limiting ourselves to the main square, which offers enough space for the event.
                </p>
                <div class="space-y-1">
                    <p class="underline">Car apply until 20.8.2025</p>
                </div>
                <a href="{{ route('events.eventosud')}}" class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">Info</a>
            </div>
            <div class="order-1 md:order-2">
                <img src="{{ asset('/img/eventi/eventosud.jpg') }}" alt="EVENTO SUD"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
            </div>
        </div>

        {{-- Video embeddato sotto --}}
        <div class="aspect-w-16 aspect-h-9">
        <video class="w-full h-full object-cover" autoplay muted loop>
            <source src="/img/video/SL.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>

    </div>
@endsection
