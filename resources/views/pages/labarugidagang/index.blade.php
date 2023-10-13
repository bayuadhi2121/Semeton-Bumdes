@extends('layouts.base')

@section('content')
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN LABA RUGI <br>BUMDES PUTRI NYALE KUTA</h2>
        <table class="min-w-full border text-sm table-auto border-neutral-400 ml-1">
            <tbody>

                {{-- PENDAPATAN DAGANG--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">A. Pendapatan Dagang</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK PENDAPATAN DAGANG --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">1. Usaha Kain Tenun</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">  </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Penjualan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp500.000</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Persediaan Barang dagang awal</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pembelian</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Barang Tersedia Terjual</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Persedian Barang Dagang Akhir</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Harga Pokok Penjualan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                {{-- LABA RUGI--}}
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r pl-6 px-2  py-2 border-neutral-400">Laba/Rugi</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                    
                </tr>
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Pendapatan Dagang (1+2)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    
                </tr>

                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                
                {{-- ---------------------------------------- --}}
                
                {{-- PENDAPATAN LAINNYA--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">B. Pendapatan Lainnya</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK PENDAPATAN LAINNYA --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pendapatan Bank</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp500.000 </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pendapatan Sumbangan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                {{-- TOTAL PENDAPATAN LAINNYA--}}
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Pendapatan Lainnya</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                    
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ---------------------------------------- --}}
                
                <tr class="border-b border-neutral-400">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">C. Laba Kotor (A+B)</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- BEBAN--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">D. Beban</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK BEBAN --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">1. Beban Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">  </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Angkut Penjualan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp500.000</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Angkut Pembelian</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Gaji</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Barang Perlengkapan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Listrik</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Sewa</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Penyusutan Inventaris</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Operasional Lainnya</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
            
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">                     </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                </tr>   

                 {{-- GAP KOSONG --}}
                 <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
 
                {{-- ANAK BEBAN --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">2. Beban Lain-Lain</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Bunga</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp500.000</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Denda</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Administrasi Bank</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp500.000</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban lain-lainnya</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Lain-lain</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">                     </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                </tr>   
                

                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                {{-- TOTAL BEBAN --}}
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300" >
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total Beban (1+2)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">23123</td>
                    
                </tr>
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300" >
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Laba/Rugi Bersih (C-D)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">232323</td>
                    
                </tr>
                


            </tbody>
        </table>

        {{-- TANDA TANGAN --}}
        <div class="flex justify-between mt-4 text-center">
            <div>
                <p>Mengetahui</p>
                <p class="mb-8 pb-8">Komisaris</p>
                <p class="mt-8 pt-8">.........................</p>
            </div>
            <div>
                <p>Mengetahui</p>
                <p class="mb-8 pb-8">Ketua Bumdes</p>
                <p class="mt-8 pt-8">.........................</p>
            </div>
            <div>
                <p>Yang Melaporkan</p>
                <p class="mb-8 pb-8">Bendahara</p>
                <p class="mt-8 pt-8">.........................</p>
            </div>
        </div>
@endsection
