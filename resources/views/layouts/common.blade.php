@extends('layouts.global')

@section('global_content')
    {{-- <div class="flex justify-center items-center h-screen"> --}}
    @component('components.navigation')
        @slot('slot')
            <div class="min-h-[calc(100vh-210px)]">
                @yield('common_content')
            </div>
            @include('components.footer')
        @endslot
    @endcomponent
    {{-- </div> --}}
@endsection
