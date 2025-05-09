@extends('components.layout-main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 space-y-12">

        {{-- Titolo --}}
        <h1 class="text-4xl font-bold text-center uppercase">Evento Nord</h1>

        {{-- Immagine principale --}}
        <div>
            <img src="{{ asset('/img/eventi/eventonord.jpg') }}" alt="Evento Nord"
                class="w-full max-w-2xl h-auto mx-auto rounded-lg shadow-md">
        </div>

        {{-- Descrizione evento --}}
        <div class="text-lg text-fontcolor space-y-4 text-center max-w-3xl mx-auto">
            <p>
                On April 26th, 2025, we’ll gather in a unique location where classic cars and motorcycles take center stage.
            </p>
            <p>
                Enthusiasts, exhibitors, and collectors will come together to celebrate automotive and motorcycle culture in
                a
                historic and immersive setting.
            </p>

            <p><strong>Date:</strong> 26.04.2025</p>
            <p><strong>Time:</strong> 10:00 – 22:00</p>

            <p><strong>Location:</strong><br>
                Corte Leonardi<br>
                Via Mazzacavallo, 62<br>
                41043 Magreta – Italy
            </p>

            <p><strong>Car Wash Options:</strong><br>
                Esso Gas Station – Magreta<br>
            </p>

            <p><strong>Visitor Tickets:</strong><br>
                Available in our ticket shop
            </p>

            <p><strong>Ticket Info:</strong><br>
                Children (6–17 years) – €10<br>
                Children (0–5 years) – free<br>
                Free parking<br>
                Dogs are allowed<br>
                <a href="#" class="underline hover:text-black">Buy Ticket</a>
            </p>

            <p><strong>Vehicle Applications:</strong><br>
                Open from 01.02.2025, 19:00<br>
                <a href="{{ route('events.applications', ['evento' => 'nord']) }}" class="underline hover:text-black">Coming Soon</a>
            </p>
        </div>





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