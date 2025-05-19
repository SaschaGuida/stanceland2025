<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if ($application)
            <div class="bg-white shadow rounded-xl overflow-hidden p-6 space-y-8">

                {{-- Title and selection status --}}
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-800">Your Application Details</h3>

                    <div class="space-y-3">
                        {{-- Status --}}
                        <div>
                            @if (is_null($application->selezionato))
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                    🕓 In progress
                                </span>
                            @elseif ($application->selezionato === false)
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-red-100 text-red-800 rounded-full">
                                    ✖ Not selected
                                </span>
                            @elseif ($application->selezionato && !$application->pagato)
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                                    ✔ Selected
                                </span>
                                <span class="ml-2 inline-flex items-center px-3 py-1 text-sm font-medium bg-gray-100 text-gray-700 rounded-full">
                                    💸 Not paid
                                </span>
                            @elseif ($application->selezionato && $application->pagato)
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                                    ✔ Selected
                                </span>
                                <span class="ml-2 inline-flex items-center px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                    💰 Paid
                                </span>
                            @endif
                        </div>

                        {{-- Dynamic messages --}}
                        @if ($application->selezionato === false)
                            <div class="p-4 bg-red-50 border border-red-200 text-sm text-red-800 rounded-md">
                                Unfortunately, your vehicle was not selected, but we’d be happy to see you as a visitor! 🙏
                            </div>
                        @elseif ($application->selezionato && !$application->pagato)
                            <div class="p-4 bg-green-50 border border-green-200 text-sm text-green-800 rounded-md space-y-2">
                                <p>🎉 Congratulations! Your vehicle has been selected for the event.</p>
                                <p>Follow the instructions below to complete your application:</p>

                                {{-- PayPal button placeholder --}}
                                <div class="mt-2">
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                        {{-- Replace with real PayPal parameters --}}
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="CODICE_TUO_BOTTONE">
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow text-sm">
                                            Pay with PayPal
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @elseif ($application->selezionato && $application->pagato)
                            <div class="p-4 bg-blue-50 border border-blue-200 text-sm text-blue-800 rounded-md">
                                ✅ You’ve already completed the payment. You will receive more details via email soon.
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Info table --}}
                <table class="w-full text-sm text-left text-gray-700 border-t">
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <th class="py-3 pr-4 font-medium w-40">Event:</th>
                            <td class="uppercase">{{ $application->evento }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">First Name:</th>
                            <td>{{ $application->nome }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Last Name:</th>
                            <td>{{ $application->cognome }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Email:</th>
                            <td>{{ $application->email }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Phone:</th>
                            <td>{{ $application->telefono }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Address:</th>
                            <td>{{ $application->indirizzo }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">City:</th>
                            <td>{{ $application->citta }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Country:</th>
                            <td>{{ $application->stato }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">ZIP Code:</th>
                            <td>{{ $application->zip }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Instagram:</th>
                            <td>{{ $application->instagram }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Brand:</th>
                            <td>{{ $application->marca }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Model:</th>
                            <td>{{ $application->modello }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Year:</th>
                            <td>{{ $application->anno }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">License Plate:</th>
                            <td>{{ $application->targa }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium align-top">Modifications:</th>
                            <td>{{ $application->modifiche }}</td>
                        </tr>
                        <tr>
                            <th class="py-3 pr-4 font-medium">Submission Date:</th>
                            <td>{{ $application->created_at->format('d/m/Y') }}</td>
                        </tr>
                    </tbody>
                </table>

                {{-- Uploaded Photos --}}
                <div>
                    <h4 class="text-md font-semibold mb-2">Uploaded Photos</h4>
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
                No application found linked to your account.
            </div>
        @endif
    </div>
</x-app-layout>
