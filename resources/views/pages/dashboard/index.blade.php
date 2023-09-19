@extends('layouts.common')

@php
    $num = $usaha->firstItem();
@endphp

@section('common_content')
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Dashboard</h2>

    <div class="flex">

        {{-- Line Chart --}}
        <div class="basis-1/2 bg-neutral-100 rounded-lg p-6">
            <div>
                <h2 class="text-xl font-medium mb-5 pb-1 flex flex-inline border-cyan-500">Grafik Kas/Pendapatan</h2>

                
                <p>Rentang Data yang ditampilkan: 17 Agustus 2020 - 19 April 2023</p>
                <canvas id="myLineChart" class="mt-4"></canvas>
                
                <div class="flex mt-4 items-center" >
                    <div class="relative mr-2">
                        <input type="date" id="floating_outlined" class="px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="floating_outlined" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-neutral-100 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Awal</label>
                    </div>
                    <div class="relative mr-2">
                        <input type="date" id="floating_outlined" class="px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="floating_outlined" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-neutral-100 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Akhir</label>
                    </div>
                    <div>
                        <button type="submit"
                        class="text-white bg-cyan-700 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Filter</button>  
                    </div>

                </div>
             </div>
            
        </div>

        {{-- Tabel  --}}
        <div class="basis-1/2 ml-4 bg-neutral-100 rounded-lg p-6">
            <h2 class="text-xl font-medium mb-5 pb-1 flex flex-inline border-cyan-500">Tabel Apalah</h2>
            <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 border-gray-400 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class=" w-1  px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Nama Usaha
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Total Pendapatan
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($usaha as $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $num++ }}
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $item->tanggal }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->keterangan }}
                        </td>
                       
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                    </tr>
                @endforelse
                {{-- <tr>
                    <td colspan="2" class="px-6 py-4 text-gray-800 font-medium text-center">Balance</td>
                </tr> --}}
            </tbody>
        z</table>
        </div>
        

    </div>
    <div class="grid grid-cols-5 gap-4 pt-4">

        <div class="bg-neutral-100 rounded-lg p-4 text-center">
            <p class="text-gray-900">Hutang Bumdes</p>
            <p class="font-medium text-gray-900"><span>Rp.</span>100000</p>
        </div>
        <div class="bg-neutral-100 rounded-lg p-4">
            <p>Total Biaya Jasa</p>
            <p>10000</p>
        </div>
        <div class="bg-neutral-100 rounded-lg p-4">
            <p>Total Transaksi Lainnya</p>
            <p>10000</p>
        </div>
        <div class="bg-neutral-100 rounded-lg p-4">
            <p>Piutang</p>
            <p>10000</p>
        </div>
        <div class="bg-neutral-100 rounded-lg p-4">
            <p>Total Biaya dagang</p>
            <p>10000</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Sample data for two lines
                var data = {
                    labels: ['January', 'February', 'March', 'April', 'May'],
                    datasets: [
                        {
                            label: 'Line 1',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            data: [10, 20, 15, 25, 30],
                        },
                        {
                            label: 'Line 2',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            data: [15, 25, 20, 30, 35],
                        },
                    ],
                };
        
                // Chart configuration
                var config = {
                    type: 'line',
                    data: data,
                    options: {
                        scales: {
                            x: {
                                beginAtZero: true,
                            },
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                };
        
                // Create the chart
                var myChart = new Chart(document.getElementById('myLineChart'), config);
            </script>
@endsection
