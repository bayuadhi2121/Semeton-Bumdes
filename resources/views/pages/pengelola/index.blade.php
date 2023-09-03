@extends('layouts.common')

@section('common_content')
<h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Data Pengelola</h2>

@livewire('person-controller')
@endsection