<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- TOAST BENVENUTO --}}
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 500)" x-show="show"
        class="fixed top-5 right-5 bg-green-100 text-green-800 text-sm px-4 py-2 rounded shadow transition-opacity duration-5"
        style="z-index: 9999;">
        👋 Benvenuto, {{ Auth::user()->name }}!
    </div>

    {{-- CONTENUTO --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8 sm:px-6 lg:px-8">
 
            {{-- Statistiche --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Totale Selezioni -->
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Totale Selezioni</h3>
                    <p class="text-4xl font-bold text-blue-600">{{ $totalApplications }}</p>
                </div>

                <!-- Selezioni Nord -->
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Selezioni Nord</h3>
                    <p class="text-4xl font-bold text-green-600">{{ $countNord }}</p>
                </div>

                <!-- Selezioni Sud -->
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Selezioni Sud</h3>
                    <p class="text-4xl font-bold text-red-600">{{ $countSud }}</p>
                </div>
            </div>


            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Ultime 5 Selezioni</h3>
                <ul class="divide-y divide-gray-200">
                    @forelse($latestApplications as $application)
                        <li class="py-2 flex justify-between items-center">
                            <div>
                                <p class="font-medium text-gray-800">{{ $application->nome }} {{ $application->cognome }}
                                </p>
                                <p class="text-sm text-gray-500">{{ $application->email }}</p>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700">
                                {{ ucfirst($application->evento) }}
                            </span>
                        </li>
                    @empty
                        <li class="text-gray-500">Nessuna selezione trovata.</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>