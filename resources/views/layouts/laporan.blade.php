@extends('layouts.base')

@section('content')
@component('components.plain')
@slot('slot')
<div class="">
    {{ $slot }}
</div>
@endslot
@endcomponent
@endsection