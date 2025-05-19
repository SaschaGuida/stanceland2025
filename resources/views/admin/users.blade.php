<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestione Utenti') }}
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
                    <h3 class="text-lg font-semibold mb-4">Utenti con Selezione</h3>

                    @if ($usersWithSelections->count())
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200">
                                <thead class="bg-gray-100 text-xs font-semibold uppercase">
                                    <tr>
                                        <th class="px-4 py-2">Nome</th>
                                        <th class="px-4 py-2">Email</th>
                                        <th class="px-4 py-2">Evento</th>
                                        <th class="px-4 py-2">Stato</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($usersWithSelections as $user)
                                        <tr>
                                            <td class="px-4 py-2">{{ $user->name }}</td>
                                            <td class="px-4 py-2">{{ $user->email }}</td>
                                            <td class="px-4 py-2 text-uppercase">{{ $user->selezione->evento }}</td>
                                            <td class="px-4 py-2">
                                                @if (is_null($user->selezione->selezionato))
                                                    <span class="text-yellow-600">🕓 In corso</span>
                                                @elseif ($user->selezione->selezionato === false)
                                                    <span class="text-red-600">✖ Non selezionato</span>
                                                @elseif ($user->selezione->selezionato && !$user->selezione->pagato)
                                                    <span class="text-green-600">✔ Selezionato</span> - <span
                                                        class="text-gray-600">💸 Non pagato</span>
                                                @elseif ($user->selezione->selezionato && $user->selezione->pagato)
                                                    <span class="text-green-600">✔ Selezionato</span> - <span
                                                        class="text-blue-600">💰 Pagato</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">Nessun utente con selezione trovata.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>