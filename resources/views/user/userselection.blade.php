<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ciao {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if ($application)
            <div class="bg-white shadow rounded-xl overflow-hidden p-6 space-y-8">

                {{-- Titolo e stato selezione --}}
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-800">Dettagli della tua selezione</h3>

                    <div class="space-y-3">
                        {{-- Stato --}}
                        <div>
                            @if (is_null($application->selezionato))
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                    🕓 In corso
                                </span>
                            @elseif ($application->selezionato === false)
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium bg-red-100 text-red-800 rounded-full">
                                    ✖ Non selezionato
                                </span>
                            @elseif ($application->selezionato && !$application->pagato)
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                                    ✔ Selezionato
                                </span>
                                <span
                                    class="ml-2 inline-flex items-center px-3 py-1 text-sm font-medium bg-gray-100 text-gray-700 rounded-full">
                                    💸 Non pagato
                                </span>
                            @elseif ($application->selezionato && $application->pagato)
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                                    ✔ Selezionato
                                </span>
                                <span
                                    class="ml-2 inline-flex items-center px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                    💰 Pagato
                                </span>
                            @endif
                        </div>

                        {{-- Messaggi dinamici --}}
                        @if ($application->selezionato === false)
                            <div class="p-4 bg-red-50 border border-red-200 text-sm text-red-800 rounded-md">
                                Purtroppo la tua vettura non è stata selezionata, ma ti aspettiamo con piacere come visitatore!
                                🙏
                            </div>
                        @elseif ($application->selezionato && !$application->pagato)
                            <div class="p-4 bg-green-50 border border-green-200 text-sm text-green-800 rounded-md space-y-2">
                                <p>🎉 Complimenti! La tua vettura è stata selezionata per l'evento.</p>
                                <p>Segui le istruzioni qui riportate per completare la selezione:</p>

                                {{-- Placeholder per pulsante PayPal --}}
                                <div class="mt-2">
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                        {{-- Inserisci i tuoi parametri PayPal reali qui --}}
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="CODICE_TUO_BOTTONE">
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                                            Paga con PayPal
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @elseif ($application->selezionato && $application->pagato)
                            <div class="p-4 bg-blue-50 border border-blue-200 text-sm text-blue-800 rounded-md">
                                ✅ Hai già completato il pagamento. Riceverai presto maggiori dettagli via email.
                            </div>
                        @endif
                    </div>


                </div>

                {{-- Tabella info --}}
                <table class="w-full text-sm text-left text-gray-700 border-t">
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <th class="py-3 pr-4 font-medium w-40">Evento:</th>
                            <td class="uppercase">{{ $application->evento }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Nome:</th>
                            <td>{{ $application->nome }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Cognome:</th>
                            <td>{{ $application->cognome }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Email:</th>
                            <td>{{ $application->email }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Telefono:</th>
                            <td>{{ $application->telefono }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Indirizzo:</th>
                            <td>{{ $application->indirizzo }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Città:</th>
                            <td>{{ $application->citta }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Stato:</th>
                            <td>{{ $application->stato }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">CAP:</th>
                            <td>{{ $application->zip }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Instagram:</th>
                            <td>{{ $application->instagram }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Marca:</th>
                            <td>{{ $application->marca }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Modello:</th>
                            <td>{{ $application->modello }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Anno:</th>
                            <td>{{ $application->anno }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Targa:</th>
                            <td>{{ $application->targa }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium align-top">Modifiche:</th>
                            <td>{{ $application->modifiche }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Data invio:</th>
                            <td>{{ $application->created_at->format('d/m/Y') }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- Foto caricate --}}
                <div>
                    <h4 class="text-md font-semibold mb-2">Foto caricate</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        @foreach (['foto1', 'foto2', 'foto3'] as $foto)
                            @if ($application->$foto)
                                <img src="{{ asset($application->$foto) }}" class="rounded shadow w-full h-60 object-cover"
                                    alt="{{ $foto }}">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="text-center text-gray-500 text-lg">
                Nessuna selezione trovata associata al tuo account.
            </div>
        @endif
    </div>
</x-app-layout>