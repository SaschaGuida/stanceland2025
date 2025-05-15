<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestione Evento Nord') }}
        </h2>
    </x-slot>

    {{-- TOAST BENVENUTO --}}
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 500)" x-show="show"
        class="fixed top-5 right-5 bg-green-100 text-green-800 text-sm px-4 py-2 rounded shadow transition-opacity duration-300"
        style="z-index: 9999;">
        👋 Benvenuto, {{ Auth::user()->name }}!
    </div>

    {{-- CONTENUTO PRINCIPALE --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-2">
                        <h3 class="text-lg font-semibold">Selezioni Evento Nord</h3>

                        <form method="GET" class="flex items-center space-x-2">
                            <label for="selezionati" class="text-sm text-gray-600">Filtra:</label>
                            <select name="selezionati" id="selezionati" onchange="this.form.submit()"
                                class="border border-gray-300 rounded px-2 py-1 text-sm">
                                <option value="">Tutti</option>
                                <option value="1" {{ $soloSelezionati ? 'selected' : '' }}>Solo selezionati</option>
                            </select>
                        </form>
                    </div>


                    @if ($selezioniNord->count())
                        <div class="overflow-x-auto">
                            
                            @if($soloSelezionati)
                                <div class="mb-2 text-sm text-green-600 font-semibold">Visualizzazione filtrata: solo
                                    selezionati</div>
                            @endif

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead
                                    class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-4 py-2">Nome</th>
                                        <th class="px-4 py-2">Cognome</th>
                                        <th class="px-4 py-2">Email</th>
                                        <th class="px-4 py-2">Marca</th>
                                        <th class="px-4 py-2">Modello</th>
                                        <th class="px-4 py-2">Foto 1</th>
                                        <th class="px-4 py-2">Foto 2</th>
                                        <th class="px-4 py-2">Foto 3</th>
                                        <th class="px-4 py-2">Data invio</th>
                                        <th class="px-4 py-2">Stato</th>
                                        <th class="px-4 py-2">Azioni</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($selezioniNord as $selezione)
                                        <tr>
                                            <td class="px-4 py-2">{{ $selezione->nome }}</td>
                                            <td class="px-4 py-2">{{ $selezione->cognome }}</td>
                                            <td class="px-4 py-2">{{ $selezione->email }}</td>
                                            <td class="px-4 py-2">{{ $selezione->marca }}</td>
                                            <td class="px-4 py-2">{{ $selezione->modello }}</td>

                                            {{-- MINIATURE FOTO --}}
                                            @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                                                <td class="px-4 py-2">
                                                    @if ($selezione->$foto)
                                                        <img src="{{ asset($selezione->$foto) }}" alt="{{ $foto }}"
                                                            class="w-16 h-16 object-cover rounded">
                                                    @else
                                                        <span class="text-gray-400 text-xs italic">N/A</span>
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td class="px-4 py-2">{{ $selezione->created_at->format('d/m/Y') }}</td>

                                            <td class="px-4 py-2 text-sm">
                                                @if (is_null($selezione->selezionato))
                                                    <span class="text-yellow-600 font-medium">🕓 In corso</span>
                                                @elseif ($selezione->selezionato === false)
                                                    <span class="text-red-600 font-medium">✖ Non selezionato</span>
                                                @elseif ($selezione->selezionato && !$selezione->pagato)
                                                    <span class="text-green-600 font-medium">✔ Selezionato</span><br>
                                                    <span class="text-gray-600 font-medium">💸 Non pagato</span>
                                                @elseif ($selezione->selezionato && $selezione->pagato)
                                                    <span class="text-green-600 font-medium">✔ Selezionato</span><br>
                                                    <span class="text-blue-600 font-medium">💰 Pagato</span>
                                                @endif
                                            </td>



                                            <td class="px-4 py-2">
                                                <a href="{{ route('admin.dettaglio', $selezione->id) }}"
                                                    class="text-blue-600 hover:underline text-sm">Visualizza</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">Nessuna selezione trovata per l'evento Nord.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>