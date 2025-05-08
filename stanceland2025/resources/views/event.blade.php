@extends('components.layout-main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid md:grid-cols-3 gap-8 items-start">

            {{-- Colonna 1 - Immagine --}}
            <div class="md:col-span-1">
                <img src="{{ asset('/img/eventi/italia.png') }}" alt="EVENTI"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
            </div>

            {{-- Colonna 2 - Evento 1 --}}
            <div class="space-y-4">
                <img src="{{ asset('/img/eventonord.jpg') }}" alt="EVENTO NORD"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
                <p class="text-sm uppercase tracking-widest text-gray-500">26.04.2025</p>
                <h2 class="text-3xl font-semibold">STANCELAND THE NOBLE</h2>
                <p class="text-gray-700">
                    For vehicles up to model year 2000. Passion for classic cars and motorcycles: An event where
                    vehicles from the last century are celebrated in a historic motorcycle environment. Surrounded by old
                    brick buildings, we create a unique and very special atmosphere.
                </p>
                <div class="space-y-1">
                    <p><a href="#" class="underline hover:text-black">Tickets</a></p>
                    <p><a href="#" class="underline hover:text-black">Car apply until 20.4.2025</a></p>
                </div>
                <a href="#" class="inline-block mt-2 bg-black text-white px-6 py-2 uppercase tracking-wide text-sm">Info</a>
            </div>

            {{-- Colonna 3 - Evento 2 --}}
            <div class="space-y-4">
                <img src="{{ asset('/img/eventosud.jpg') }}" alt="EVENTO SUD"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
                <p class="text-sm uppercase tracking-widest text-gray-500">01.09.2025</p>
                <h2 class="text-3xl font-semibold">STANCELAND - CEPRANO</h2>
                <p class="text-gray-700">
                    The fantastic location of Oberhof in the middle of the Thuringian Forest offers an incomparable
                    atmosphere. The biathlon stadium is very spacious at around 10 kilometers long, but don’t worry: we are
                    limiting ourselves to the main square, which offers enough space for the event.
                </p>
                <div class="space-y-1">
                    <p><a href="#" class="underline hover:text-black">Car apply until 20.8.2025</a></p>
                </div>
                <a href="#" class="inline-block mt-2 bg-black text-white px-6 py-2 uppercase tracking-wide text-sm">Info</a>
            </div>

        </div>
    </div>
@endsection
