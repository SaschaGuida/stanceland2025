<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dettaglio Selezione: {{ $selezione->nome }} {{ $selezione->cognome }}
        </h2>
    </x-slot>

    <div class="py-12 text-gray-900">
        <div class="max-w-4xl mx-auto bg-white shadow sm:rounded-lg p-6 space-y-4">
            {{-- Etichetta evento dinamica + Data invio --}}
            <div
                class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm text-gray-500 mb-4 uppercase">
                <span>Evento: <strong>{{ strtoupper($selezione->evento) }}</strong></span>
                <span>Inviato il: <strong>{{ $selezione->created_at->format('d/m/Y') }}</strong></span>
            </div>

            {{-- Info personali --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div><strong>Email:</strong> {{ $selezione->email }}</div>
                <div><strong>Telefono:</strong> {{ $selezione->telefono }}</div>
                <div><strong>Indirizzo:</strong> {{ $selezione->indirizzo }}</div>
                <div><strong>Città:</strong> {{ $selezione->citta }}</div>
                <div><strong>Stato:</strong> {{ $selezione->stato }}</div>
                <div><strong>Instagram:</strong> {{ $selezione->instagram }}</div>
                <div><strong>Marca:</strong> {{ $selezione->marca }}</div>
                <div><strong>Modello:</strong> {{ $selezione->modello }}</div>
                <div><strong>Anno:</strong> {{ $selezione->anno }}</div>
                <div><strong>Targa:</strong> {{ $selezione->targa }}</div>
                <div class="sm:col-span-2"><strong>Modifiche:</strong><br>{{ $selezione->modifiche }}</div>
            </div>

            <hr>

            {{-- Foto --}}
            <h3 class="text-lg font-semibold mt-6">Foto</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                    @if ($selezione->$foto)
                        <img src="{{ asset($selezione->$foto) }}" class="rounded shadow w-full h-64 object-cover"
                            alt="{{ $foto }}">
                    @endif
                @endforeach
            </div>

            {{-- Bottoni --}}
            <div class="flex flex-wrap gap-4 justify-center mt-10">
                {{-- Approva --}}
                <form method="POST" action="{{ route('admin.selezioni.aggiorna', $selezione->id) }}">
                    @csrf
                    <input type="hidden" name="selezionato" value="1">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded shadow">
                        Approva
                    </button>
                </form>

                {{-- Non approvare --}}
                <form method="POST" action="{{ route('admin.selezioni.aggiorna', $selezione->id) }}">
                    @csrf
                    <input type="hidden" name="selezionato" value="0">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded shadow">
                        Non approvare
                    </button>
                </form>

                {{-- Pagato --}}
                <form method="POST" action="{{ route('admin.selezioni.aggiorna', $selezione->id) }}">
                    @csrf
                    <input type="hidden" name="pagato" value="1">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded shadow">
                        Pagato
                    </button>
                </form>

                {{-- Non pagato --}}
                <form method="POST" action="{{ route('admin.selezioni.aggiorna', $selezione->id) }}">
                    @csrf
                    <input type="hidden" name="pagato" value="0">
                    <button type="submit"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-medium px-5 py-2 rounded shadow">
                        Non pagato
                    </button>
                </form>

                {{-- Indietro --}}
                <a href="{{ $selezione->evento === 'sud' ? route('admin.sud') : route('admin.nord') }}"
                    class="border border-gray-400 text-gray-700 hover:bg-gray-100 px-5 py-2 rounded shadow">
                    Indietro
                </a>
            </div>

        </div>
    </div>
</x-app-layout>