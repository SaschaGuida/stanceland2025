@extends('components.layout-main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 space-y-12">

        {{-- Titolo --}}
        <h1 class="text-4xl font-bold text-center uppercase">Stanceland Giappone</h1>

        {{-- Immagine principale --}}
        <div>
            <img src="{{ asset('/img/eventi/eventogiappone.jpg') }}" alt="Evento Giappone"
                class="w-full max-w-2xl h-auto mx-auto rounded-lg shadow-md">
        </div>

        {{-- Descrizione evento --}}
        <div class="text-lg text-fontcolor space-y-4 text-center max-w-3xl mx-auto">
            <p>
                From September 5th to 7th, 2025, Stanceland brings you an unforgettable three-day event between Ceprano and Falvaterra.
                A celebration of automotive culture where enthusiasts, tuners, and collectors meet up under the southern sun.
            </p>

            <p><strong>Date:</strong> 5–7 September 2025</p>

            <p><strong>Schedule:</strong><br>
                <span class="block">5 September: 18:00 – 24:00<br>Via Campo del Greco 1, Ceprano</span>
                <span class="block">6 September: 10:00 – 14:00 in Falvaterra<br>15:00 – 24:00 in Ceprano</span>
                <span class="block">7 September: 10:00 – 18:00 in Ceprano</span>
            </p>

            <p><strong>Vehicle Applications:</strong><br>
                Applications open in May 2025<br>
                <a href="{{ route('events.applications', ['evento' => 'giappone']) }}" class="underline hover:text-black">Apply here</a>
            </p>
        </div>

        {{-- Galleria foto --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
        </div>

    </div>
@endsection
