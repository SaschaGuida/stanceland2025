@extends('components.layout-main')

@section('content')

{{-- SEZIONE 1 - EVENTO NORD --}}
<section class="w-full bg-background text-fontcolor mt-10">
    <div class="flex flex-col lg:flex-row w-full h-auto lg:h-[400px]">
        <!-- Immagine -->
        <div class="w-full lg:w-1/2 h-[250px] lg:h-full">
            <img src="{{ asset($eventoNord->immagine) }}" alt="EVENTO NORD" class="w-full h-full object-cover">
        </div>

        <!-- Contenuto -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-6 lg:px-8 text-center lg:text-left">
            <div class="space-y-4 max-w-md w-full">
                <p class="text-sm uppercase tracking-widest">
                    {{ \Carbon\Carbon::parse($eventoNord->data)->format('d.m.Y') }}
                </p>
                <h2 class="text-3xl font-semibold">{{ $eventoNord->titolo }}</h2>
                <p>{{ $eventoNord->descrizione }}</p>

                <p class="underline">
                    Car apply until {{ \Carbon\Carbon::parse($eventoNord->data)->subDays(6)->format('d.m.Y') }}
                </p>

                <div class="flex flex-col sm:flex-row gap-2 sm:justify-center lg:justify-start">
                    <a href="{{ route('events.eventonord') }}" class="border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">Info</a>

                    @if($eventoNord->abilita_selezione)
                        <a href="{{ route('events.applications', ['evento' => 'nord']) }}" class="border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">Apply Now</a>
                    @endif

                    @if($eventoNord->abilita_ticket)
                        <a href="https://shop.stanceland.com" class="border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">Buy Tickets</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SEZIONE 2 - EVENTO SUD --}}
<section class="w-full bg-white text-black mt-10 lg:mt-0">
    <div class="flex flex-col-reverse lg:flex-row w-full h-auto lg:h-[400px]">
        <!-- Contenuto -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-6 lg:px-8 text-center lg:text-left">
            <div class="space-y-4 max-w-md w-full">
                <p class="text-sm uppercase tracking-widest">
                    {{ \Carbon\Carbon::parse($eventoSud->data)->format('d.m.Y') }}
                </p>
                <h2 class="text-3xl font-semibold">{{ $eventoSud->titolo }}</h2>
                <p>{{ $eventoSud->descrizione }}</p>

                <p class="underline">
                    Car apply until {{ \Carbon\Carbon::parse($eventoSud->data)->subDays(6)->format('d.m.Y') }}
                </p>

                <div class="flex flex-col sm:flex-row gap-2 sm:justify-center lg:justify-start">
                    <a href="{{ route('events.eventosud') }}" class="border border-black text-black hover:bg-black hover:text-white rounded-lg text-sm px-4 py-2 transition">Info</a>

                    @if($eventoSud->abilita_selezione)
                        <a href="{{ route('events.applications', ['evento' => 'sud']) }}" class="border border-black text-black hover:bg-black hover:text-white rounded-lg text-sm px-4 py-2 transition">Apply Now</a>
                    @endif

                    @if($eventoSud->abilita_ticket)
                        <a href="https://shop.stanceland.com" class="border border-black text-black hover:bg-black hover:text-white rounded-lg text-sm px-4 py-2 transition">Buy Tickets</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Immagine -->
        <div class="w-full lg:w-1/2 h-[250px] lg:h-full">
            <img src="{{ asset($eventoSud->immagine) }}" alt="EVENTO SUD" class="w-full h-full object-cover">
        </div>
    </div>
</section>

{{-- SEZIONE 3 - EVENTO GIAPPONE --}}
<section class="w-full bg-background text-fontcolor mt-10 lg:mt-0">
    <div class="flex flex-col lg:flex-row w-full h-auto lg:h-[400px]">
        <!-- Immagine -->
        <div class="w-full lg:w-1/2 h-[250px] lg:h-full">
            <img src="{{ asset($eventoGiappone->immagine) }}" alt="EVENTO GIAPPONE" class="w-full h-full object-cover">
        </div>

        <!-- Contenuto -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-6 lg:px-8 text-center lg:text-left">
            <div class="space-y-4 max-w-md w-full">
                <p class="text-sm uppercase tracking-widest">
                    {{ \Carbon\Carbon::parse($eventoGiappone->data)->format('d.m.Y') }}
                </p>
                <h2 class="text-3xl font-semibold">{{ $eventoGiappone->titolo }}</h2>
                <p>{{ $eventoGiappone->descrizione }}</p>

                <p class="underline">
                    Car apply until {{ \Carbon\Carbon::parse($eventoGiappone->data)->subDays(6)->format('d.m.Y') }}
                </p>

                <div class="flex flex-col sm:flex-row gap-2 sm:justify-center lg:justify-start">
                    <a href="{{ route('events.eventogiappone') }}" class="border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">Info</a>

                    @if($eventoGiappone->abilita_selezione)
                        <a href="{{ route('events.applications', ['evento' => 'giappone']) }}" class="border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">Apply Now</a>
                    @endif

                    @if($eventoGiappone->abilita_ticket)
                        <a href="https://shop.stanceland.com" class="border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">Buy Tickets</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="w-full mt-24">
    <div class="aspect-w-16 aspect-h-9">
        <video class="w-full h-full object-cover" autoplay muted loop>
            <source src="/img/video/SL.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

@endsection
