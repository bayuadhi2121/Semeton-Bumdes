@extends('layouts.base')

@section('content')
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN LABA RUGI <br>BUMDES PUTRI NYALE KUTA</h2>
        <table class="min-w-full border text-sm table-auto border-neutral-500">
            <tbody>
                {{-- Judul --}}
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500 bg-cyan-400">
                    URAIAN
                    </td>
                </tr>
                {{-- HEADER --}}
                <tr class="border-b border-neutral-500 bg-cyan-200">
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-500">
                    No
                    </td>
                    <td class="whitespace-nowrap border-r px-2 py-2 font-medium border-neutral-500">
                    4. PENDAPATAN
                    </td>
                    <td class="whitespace-nowrap border-r px-2 py-2 font-medium border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- PENDAPATAN --}}
                {{-- PENDAPATAN 4.1 --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 font-medium py-2 border-neutral-500">
                    4.1 
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Pendapatan Operasional
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- silakan looping --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 py-2 border-neutral-500">
                    4.1.1 
                    </td>
                    <td class="border-r px-2  py-2 border-neutral-500">
                        Penjualan Gas
                    </td>
                    <td class=" border-r px-2  py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- stop looping --}}
                {{-- TOTAL PENDPATAN OPERASIONAL --}}
                <tr class="border-b border-neutral-500 font-medium bg-cyan-200" >
                    <td colspan="2" class="text-center whitespace-nowrap border-r py-2  border-neutral-500 ">
                    Total Pendapatan Operasional
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-500">
                        Rp.
                        </td>
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500">
                    
                    </td>
                </tr>

                {{-- PENDAPATAN 4.2 --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 font-medium py-2 border-neutral-500">
                    4.2 
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium  py-2 border-neutral-500">
                        Pendapatan Non-Operasional
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium  py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- silakan looping --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 py-2 border-neutral-500">
                    4.2.1 
                    </td>
                    <td class="border-r px-2  py-2 border-neutral-500">
                        Bunga Bank
                    </td>
                    <td class=" border-r px-2  py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- stop looping --}}


                {{-- TOTAL PENDPATAN NON-OPERASIONAL --}}
                <tr class="border-b border-neutral-500 font-medium bg-cyan-200" >
                    <td colspan="2" class="text-center whitespace-nowrap border-r py-2  border-neutral-500 ">Total Pendapatan Non Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-500">Rp.</td>
                </tr>
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500"></td>
                </tr>
               

                {{-- TOTAL PENDAPATAN --}}
                <tr class="border-b border-neutral-500 bg-cyan-300" >
                    <td colspan="2" class="whitespace-nowrap border-r text-center  py-2 font-bold border-neutral-500 ">
                    TOTAL PENDAPATAN
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-bold py-2 border-neutral-500">Rp.</td>
                </tr>
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500">
                    
                    </td>
                </tr>


                {{-- HEADER BIAYA --}}
                <tr class="border-b border-neutral-500 bg-cyan-200">
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-500">
                    No
                    </td>
                    <td class="whitespace-nowrap border-r px-2 py-2 font-medium border-neutral-500">
                    5. BIAYA
                    </td>
                    <td class="whitespace-nowrap border-r px-2 py-2 font-medium border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- BIAYA --}}
                {{-- BIAYA 5.1 --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 font-medium py-2 border-neutral-500">
                    5.1 
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Biaya Operasional
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- silakan looping --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 py-2 border-neutral-500">
                    5.1.1 
                    </td>
                    <td class="border-r px-2  py-2 border-neutral-500">
                        ATK
                    </td>
                    <td class=" border-r px-2  py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- stop looping --}}
                {{-- TOTAL Biaya OPERASIONAL --}}
                <tr class="border-b border-neutral-500 font-medium bg-cyan-200" >
                    <td colspan="2" class="text-center whitespace-nowrap border-r py-2  border-neutral-500 ">
                    Total Biaya Operasional
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-500">
                        Rp.
                        </td>
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500">
                    
                    </td>
                </tr>
                {{-- PENDAPATAN 5.2 --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 font-medium py-2 border-neutral-500">
                    5.2 
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium  py-2 border-neutral-500">
                        Biaya Non-Operasional
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium  py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>

                {{-- silakan looping --}}
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r pl-1 pr-0 py-2 border-neutral-500">
                    5.2.1 
                    </td>
                    <td class="border-r px-2  py-2 border-neutral-500">
                        Pajak Bunga Bank
                    </td>
                    <td class=" border-r px-2  py-2 border-neutral-500">
                    Rp.
                    </td>
                </tr>
                {{-- stop looping --}}


                {{-- TOTAL Biaya NON-OPERASIONAL --}}
                <tr class="border-b border-neutral-500 font-medium bg-cyan-200" >
                    <td colspan="2" class="text-center whitespace-nowrap border-r py-2  border-neutral-500 ">Total Biaya Non Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-500">Rp.</td>
                </tr>
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500"></td>
                </tr>


                {{-- TOTAL BIAYA --}}
                <tr class="border-b border-neutral-500 bg-cyan-300" >
                    <td colspan="2" class="whitespace-nowrap border-r text-center  py-2 font-bold border-neutral-500 ">
                    TOTAL BIAYA
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-bold py-2 border-neutral-500">Rp.</td>
                </tr>
                <tr class="border-b border-neutral-500 text-center " >
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500">
                    
                    </td>
                </tr>
                {{-- Laba Rugi --}}
                <tr class="border-b border-neutral-500 bg-cyan-300" >
                    <td colspan="2" class="whitespace-nowrap border-r text-center  py-2 font-bold border-neutral-500 ">
                    LABA / RUGI (PENDPATAN-BIAYA)
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-bold py-2 border-neutral-500">Rp.</td>
                </tr>
            </tbody>
        </table>

        {{-- TANDA TANGAN --}}
        <div class="flex justify-between mt-4">
            <div>
                <p>Diperiksa Oleh</p>
                <p class="mb-8 pb-8">Ketua Bumdes</p>
                <p class="mt-8 pt-8">(EMUR)</p>
            </div>
            <div>
                <p>Dibuat Oleh</p>
                <p class="mb-8 pb-8">Bendahara</p>
                <p class="mt-8 pt-8">(FETRILIA VIOLANDA)</p>
            </div>
        </div>
@endsection
