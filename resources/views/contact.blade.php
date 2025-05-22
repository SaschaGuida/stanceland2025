@extends('components.layout-main')

@section('content')
    <section class="w-full max-w-2xl mx-auto px-4 py-12 text-fontcolor">
        <h3 class="text-3xl font-bold mb-8 text-center">Contact Us</h3>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded shadow text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nome" class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="nome" id="nome" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-background text-fontcolor focus:outline-none focus:ring-2 focus:ring-fontcolor" />
                </div>

                <div>
                    <label for="cognome" class="block text-sm font-medium mb-1">Last Name</label>
                    <input type="text" name="cognome" id="cognome" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-background text-fontcolor focus:outline-none focus:ring-2 focus:ring-fontcolor" />
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-background text-fontcolor focus:outline-none focus:ring-2 focus:ring-fontcolor" />
            </div>

            <div>
                <label for="messaggio" class="block text-sm font-medium mb-1">Message</label>
                <textarea name="messaggio" id="messaggio" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md bg-background text-fontcolor focus:outline-none focus:ring-2 focus:ring-fontcolor"></textarea>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="inline-block border border-fontcolor text-fontcolor hover:bg-fontcolor hover:text-background rounded-lg text-sm px-6 py-2 transition">
                    Send Message
                </button>
            </div>
        </form>
    </section>
@endsection
