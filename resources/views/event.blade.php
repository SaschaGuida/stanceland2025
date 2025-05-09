@extends('components.layout-main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12 space-y-16">

        {{-- Evento Nord --}}
        <div class="grid md:grid-cols-2 items-center">
            <div>
                <img src="{{ asset($eventoNord->immagine) }}" alt="EVENTO NORD"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
            </div>
            <div class="space-y-4">
                <p class="text-sm uppercase tracking-widest text-fontcolor">
                    {{ \Carbon\Carbon::parse($eventoNord->data)->format('d.m.Y') }}
                </p>
                <h2 class="text-3xl font-semibold">{{ $eventoNord->titolo }}</h2>
                <p class="text-fontcolor">{{ $eventoNord->descrizione }}</p>

                <div class="space-y-1">
                    <p class="underline">
                        Car apply until {{ \Carbon\Carbon::parse($eventoNord->data)->subDays(6)->format('d.m.Y') }}
                    </p>

                    @if($eventoNord->abilita_selezione)
                        <p>
                            <a href="{{ route('events.applications', ['evento' => 'nord']) }}"
                                class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                                Apply Now
                            </a>
                        </p>
                    @endif

                    @if($eventoNord->abilita_ticket)
                        <p>
                            <a href="https://shop.stanceland.com"
                                class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                                Buy Tickets
                            </a>
                        </p>
                    @endif

                </div>

                {{-- Sempre visibile --}}
                <a href="{{ route('events.eventonord') }}"
                    class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                    Info
                </a>
            </div>
        </div>



        {{-- Evento Sud --}}
        <div class="grid md:grid-cols-2 items-center">
            <div class="space-y-4 order-2 md:order-1">
                <p class="text-sm uppercase tracking-widest text-fontcolor">
                    {{ \Carbon\Carbon::parse($eventoSud->data)->format('d.m.Y') }}
                </p>
                <h2 class="text-3xl font-semibold">{{ $eventoSud->titolo }}</h2>
                <p class="text-fontcolor">{{ $eventoSud->descrizione }}</p>
                <div class="space-y-1">
                    <p class="underline">Car apply until
                        {{ \Carbon\Carbon::parse($eventoSud->data)->subDays(6)->format('d.m.Y') }}
                    </p>
                    @if($eventoSud->abilita_selezione)
                        <p>
                            <a href="{{ route('events.applications', ['evento' => 'sud']) }}"
                                class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                                Apply Now
                            </a>
                        </p>
                    @endif

                    @if($eventoSud->abilita_ticket)
                        <p>
                            <a href="https://shop.stanceland.com"
                                class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">
                                Buy Tickets
                            </a>
                        </p>
                    @endif
                </div>
                <a href="{{ route('events.eventosud')}}"
                    class="text-fontcolor border border-fontcolor hover:bg-fontcolor hover:text-background focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors">Info</a>
            </div>
            <div class="order-1 md:order-2">
                <img src="{{ asset($eventoSud->immagine) }}" alt="EVENTO SUD"
                    class="w-full h-auto object-cover rounded-lg shadow-md">
            </div>
        </div>

        {{-- Video --}}
        <div class="aspect-w-16 aspect-h-9">
            <video class="w-full h-full object-cover" autoplay muted loop>
                <source src="/img/video/SL.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

    </div>
@endsection