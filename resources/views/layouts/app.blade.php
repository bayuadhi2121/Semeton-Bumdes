@extends('layouts.base')

@section('content')
    @component('components.navigation')
        @slot('slot')
            <div class="min-h-[calc(100vh-210px)]">
                {{ $slot }}
            </div>
            @include('components.footer')
        @endslot
    @endcomponent
@endsection
