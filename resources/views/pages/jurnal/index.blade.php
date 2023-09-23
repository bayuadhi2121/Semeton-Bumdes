@extends('layouts.common')

@php
    $num = $jurnal->firstItem();
@endphp

@section('common_content')
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Jurnal</h2>

    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="w-1 px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Akun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kredit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Debit
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jurnal as $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $num++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->tanggal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->keterangan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->stok }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->nota }}
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $jurnal->links() }}
    </div>

   
    
    
@endsection
