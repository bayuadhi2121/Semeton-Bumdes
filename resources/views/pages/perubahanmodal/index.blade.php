@extends('layouts.base')

@section('content')
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN LABA RUGI <br>BUMDES PUTRI NYALE KUTA</h2>
        <table class="min-w-full border text-sm table-auto border-neutral-400 ml-1">
            <tbody>

                {{-- SECTION 1 --}}
                <tr class="border-b border-neutral-400">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">1. Penyertaan Modal</td>
                </tr>

                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Modal Awal</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp3.000.000</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">  </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Tambahan Investasi</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-12 pr-0  py-2 border-neutral-400">Penyertaan Modal Desa</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-12 pr-0  py-2 border-neutral-400">Penyertaan Modal Masyarakat</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                
                {{-- TOTAL SECTION 1--}}
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Penyertaan Modal</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                    
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                
                {{-- ---------------------------------------- --}}
                {{-- SECTION 2 --}}
                <tr class="border-b border-neutral-400">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">2. Laba Ditahan</td>
                </tr>

                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Laba Ditahan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Laba/Rugi</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Bagi Hasil Investasi</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-12 pr-0  py-2 border-neutral-400">Penyertaan Modal Desa</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-12 pr-0  py-2 border-neutral-400">Penyertaan Modal Masyarakat</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp3.000.000 </td>
                </tr>
                
                {{-- TOTAL SECTION 2--}}
                <tr class="border-b border-neutral-400 font-medium" >
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Laba Ditahan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                    
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                {{-- Modal Akhir --}}
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300" >
                    <td colspan="2" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Modal Akhir (1+2)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">RP. Berapa kek</td>
                    
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
