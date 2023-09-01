@extends('layouts.global')

@section('global_content')
    @component('components.navigation')
        @slot('slot')
            <div class="min-h-[calc(100vh-210px)]">
                @yield('common_content')
            </div>
            @include('components.footer')
        @endslot
    @endcomponent
@endsection
