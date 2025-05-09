@extends('components.layout-main')

@section('content')
    <div class="min-h-screen items-start justify-center pt-24">
        <div class="w-full px-4">
            @if (session('success'))
                <div
                    class="max-w-sm mx-auto mb-6 text-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif


            <div class="text-center text-2xl font-semibold mb-8">
                {{ $titolo }}
            </div>

            <form class="max-w-sm mx-auto" method="POST" action="{{ route('events.applications', ['evento' => request('evento', 'nord')]) }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="evento" value="{{ request('evento', 'nord') }}">

                <div class="mb-5">
                    <label for="nome" class="block mb-2 text-sm font-medium text-fontcolor dark:text-white">Name</label>
                    <input type="text" id="nome" name="nome" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Name" required />
                </div>

                <div class="mb-5">
                    <label for="cognome"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cognome</label>
                    <input type="text" id="cognome" name="cognome" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Rossi" required />
                </div>


                <div class="mb-5">
                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero di
                        telefono</label>
                    <input type="tel" id="telefono" name="telefono" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="+39 123 456 7890" required />
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email" name="email" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="name@example.com" required />
                </div>

                <div class="mb-5">
                    <label for="indirizzo"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indirizzo</label>
                    <input type="text" id="indirizzo" name="indirizzo" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Via Roma 1" required />
                </div>

                <div class="mb-5">
                    <label for="citta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Città</label>
                    <input type="text" id="citta" name="citta" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Milano" required />
                </div>

                <div class="mb-5">
                    <label for="stato" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stato</label>
                    <input type="text" id="stato" name="stato" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Italia" required />
                </div>

                <div class="mb-5">
                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CAP</label>
                    <input type="text" id="zip" name="zip" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="20100" required />
                </div>

                <div class="mb-5">
                    <label for="instagram"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                    <input type="text" id="instagram" name="instagram" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="@tuonome" />
                </div>

                <div class="mb-5">
                    <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca</label>
                    <input type="text" id="marca" name="marca" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="BMW" required />
                </div>

                <div class="mb-5">
                    <label for="modello"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modello</label>
                    <input type="text" id="modello" name="modello" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Serie 3" required />
                </div>

                <div class="mb-5">
                    <label for="anno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anno</label>
                    <input type="number" id="anno" name="anno" value="{{ old('anno') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" required />
                    @error('anno')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="modifiche"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modifiche</label>
                    <textarea id="modifiche" name="modifiche" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="Sospensioni, cerchi, wrap..."
                        rows="3" required></textarea>
                </div>

                <div class="mb-5">
                    <label for="targa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Targa</label>
                    <input type="text" id="targa" name="targa" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" placeholder="AB123CD" required />
                </div>

                <div class="mb-5">
                    <label for="foto1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload foto
                        1</label>
                    <input type="file" id="foto1" name="foto1"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" required />
                </div>

                <div class="mb-5">
                    <label for="foto2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload foto
                        2</label>
                    <input type="file" id="foto2" name="foto2"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" required />
                </div>

                <div class="mb-5">
                    <label for="foto3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload foto
                        3</label>
                    <input type="file" id="foto3" name="foto3"
                        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:border-fontcolor focus:ring-fontcolor block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:border-fontcolor dark:focus:ring-fontcolor" required />
                </div>

                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 
                                dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 
                                dark:focus:ring-offset-gray-800" required />
                    </div>
                    <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                            conditions</a>
                    </label>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                        dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Send Application
                </button>

            </form>

@endsection