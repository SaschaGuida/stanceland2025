<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestione Eventi') }}
        </h2>
    </x-slot>

    {{-- TOAST BENVENUTO --}}
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 500)" x-show="show"
        class="fixed top-5 right-5 bg-green-100 text-green-800 text-sm px-4 py-2 rounded shadow transition-opacity duration-300"
        style="z-index: 9999;">
        👋 Benvenuto, {{ Auth::user()->name }}!
    </div>



    <div class="py-12">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Form Evento NORD --}}
            <form action="{{ route('admin.eventi.update', 'nord') }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow sm:rounded-lg p-6 space-y-4">
                @csrf
                @method('PUT')

                <h3 class="text-xl font-semibold">Evento Nord</h3>

                <x-input-label value="Titolo" />
                <x-text-input name="titolo" value="{{ old('titolo', $eventoNord->titolo) }}" class="w-full" />

                <x-input-label value="Descrizione" />
                <textarea name="descrizione"
                    class="form-textarea w-full">{{ old('descrizione', $eventoNord->descrizione) }}</textarea>

                <x-input-label value="Data" />
                <x-text-input name="data" type="date" value="{{ old('data', $eventoNord->data) }}" class="w-full" />

                <x-input-label value="Immagine" />
                <input type="file" name="immagine" class="form-input w-full" />

                <label class="flex items-center">
                    <input type="checkbox" name="mostra_ticket" {{ $eventoNord->abilita_ticket ? 'checked' : '' }}
                        class="mr-2">
                    <span>Mostra bottone ticket</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" name="mostra_selezione" {{ $eventoNord->abilita_selezione ? 'checked' : '' }}
                        class="mr-2">
                    <span>Mostra bottone selezioni</span>
                </label>

                <x-primary-button>Salva Evento Nord</x-primary-button>
            </form>

            {{-- Form Evento SUD --}}
            <form action="{{ route('admin.eventi.update', 'sud') }}" method="POST" enctype="multipart/form-data"
                class="bg-white shadow sm:rounded-lg p-6 space-y-4">
                @csrf
                @method('PUT')

                <h3 class="text-xl font-semibold">Evento Sud</h3>

                <x-input-label value="Titolo" />
                <x-text-input name="titolo" value="{{ old('titolo', $eventoSud->titolo) }}" class="w-full" />

                <x-input-label value="Descrizione" />
                <textarea name="descrizione"
                    class="form-textarea w-full">{{ old('descrizione', $eventoSud->descrizione) }}</textarea>

                <x-input-label value="Data" />
                <x-text-input name="data" type="date" value="{{ old('data', $eventoSud->data) }}" class="w-full" />

                <x-input-label value="Immagine" />
                <input type="file" name="immagine" class="form-input w-full" />

                <label class="flex items-center">
                    <input type="checkbox" name="mostra_ticket" {{ $eventoSud->abilita_ticket ? 'checked' : '' }}
                        class="mr-2">
                    <span>Mostra bottone ticket</span>
                </label>

                <label class="flex items-center">
                    <input type="checkbox" name="mostra_selezione" {{ $eventoSud->abilita_selezione ? 'checked' : '' }}
                        class="mr-2">
                    <span>Mostra bottone selezioni</span>
                </label>

                <x-primary-button>Salva Evento Sud</x-primary-button>
            </form>

        </div>
    </div>
</x-app-layout>