@extends('components.layout-main')

@section('content')
    <section class="max-w-5xl mx-auto px-6 py-12 text-fontcolor leading-relaxed space-y-6">
        {!! file_get_contents(resource_path('views/legal/includes/impressum.html')) !!}
    </section>
@endsection
