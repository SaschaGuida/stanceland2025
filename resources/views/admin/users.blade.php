<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestione Utenti') }}
        </h2>
    </x-slot>

    {{-- TOAST BENVENUTO --}}
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 500)"
        x-show="show"
        class="fixed top-5 right-5 bg-green-100 text-green-800 text-sm px-4 py-2 rounded shadow transition-opacity duration-300"
        style="z-index: 9999;">
        👋 Benvenuto, {{ Auth::user()->name }}!
    </div>

    {{-- CONTENUTO PRINCIPALE --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    users
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
