<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ciao {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if ($application)
            <p class="text-gray-700 mb-6">Hai inviato una candidatura per l'evento <strong>{{ strtoupper($application->evento) }}</strong> il {{ $application->created_at->format('d/m/Y') }}</p>
            <p class="text-gray-700">Stato selezione:
                @if (is_null($application->selezionato))
                    <span class="text-yellow-600">In corso</span>
                @elseif (!$application->selezionato)
                    <span class="text-red-600">Non selezionato</span>
                @elseif ($application->selezionato && !$application->pagato)
                    <span class="text-green-600">Selezionato - Non pagato</span>
                @else
                    <span class="text-blue-600">Selezionato - Pagato</span>
                @endif
            </p>
        @else
            <p class="text-gray-500">Non risulta nessuna candidatura associata al tuo account.</p>
        @endif
    </div>
</x-app-layout>
