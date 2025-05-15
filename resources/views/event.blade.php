@extends('components.layout-main')

@section('content')

    {{-- SEZIONE 1 - EVENTO NORD (sfondo nero, immagine bassa e larga prova) --}}
    <section class="w-full bg-background text-fontcolor mt-10">
        <div class="flex flex-col lg:flex-row w-full h-[400px]">
            <!-- Immagine -->
            <div class="w-full lg:w-1/2 h-full ">
                <img src="{{ asset($eventoNord->immagine) }}" alt="EVENTO NORD"
                    class="w-full h-full object-cover">
            </div>

            <!-- Contenuto -->
            <div class="w-full lg:w-1/2 h-full flex items-center justify-center px-8">
                <div class="space-y-4 max-w-md">
                    <p class="text-sm uppercase tracking-widest">
                        {{ \Carbon\Carbon::parse($eventoNord->data)->format('d.m.Y') }}
                    </p>
                    <h2 class="text-3xl font-semibold">{{ $eventoNord->titolo }}</h2>
                    <p>{{ $eventoNord->descrizione }}</p>

                    <p class="underline">
                        Car apply until {{ \Carbon\Carbon::parse($eventoNord->data)->subDays(6)->format('d.m.Y') }}
                    </p>

                    @if($eventoNord->abilita_selezione)
                        <a href="{{ route('events.applications', ['evento' => 'nord']) }}"
                            class="block border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">
                            Apply Now
                        </a>
                    @endif

                    @if($eventoNord->abilita_ticket)
                        <a href="https://shop.stanceland.com"
                            class="block border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">
                            Buy Tickets
                        </a>
                    @endif

                    <a href="{{ route('events.eventonord') }}"
                        class="block border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-4 py-2 transition">
                        Info
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SEZIONE 2 - EVENTO SUD (sfondo bianco, immagine a destra) --}}
    <section class="w-full bg-white text-black">
        <div class="flex flex-col lg:flex-row w-full h-[400px]">
            <!-- Contenuto -->
            <div class="w-full lg:w-1/2 h-full flex items-center justify-center px-8">
                <div class="space-y-4 max-w-md">
                    <p class="text-sm uppercase tracking-widest">
                        {{ \Carbon\Carbon::parse($eventoSud->data)->format('d.m.Y') }}
                    </p>
                    <h2 class="text-3xl font-semibold">{{ $eventoSud->titolo }}</h2>
                    <p>{{ $eventoSud->descrizione }}</p>

                    <p class="underline">
                        Car apply until {{ \Carbon\Carbon::parse($eventoSud->data)->subDays(6)->format('d.m.Y') }}
                    </p>

                    @if($eventoSud->abilita_selezione)
                        <a href="{{ route('events.applications', ['evento' => 'sud']) }}"
                            class="block border border-black text-black hover:bg-black hover:text-white rounded-lg text-sm px-4 py-2 transition">
                            Apply Now
                        </a>
                    @endif

                    @if($eventoSud->abilita_ticket)
                        <a href="https://shop.stanceland.com"
                            class="block border border-black text-black hover:bg-black hover:text-white rounded-lg text-sm px-4 py-2 transition">
                            Buy Tickets
                        </a>
                    @endif

                    <a href="{{ route('events.eventosud') }}"
                        class="block border border-black text-black hover:bg-black hover:text-white rounded-lg text-sm px-4 py-2 transition">
                        Info
                    </a>
                </div>
            </div>

            <!-- Immagine -->
            <div class="w-full lg:w-1/2 h-full">
                <img src="{{ asset($eventoSud->immagine) }}" alt="EVENTO SUD"
                    class="w-full h-full object-cover">
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
