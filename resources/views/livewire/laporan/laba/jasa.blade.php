<div>
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN LABA RUGI <br>BUMDES PUTRI NYALE KUTA</h2>
        <table class="min-w-full border text-sm table-auto border-neutral-400 ml-1">
            <tbody>

                {{-- PENDAPATAN JASA--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">A.
                        Pendapatan Jasa</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK PENDAPATAN JASA --}}
                @php
                $totalpendapatan=0;
                @endphp
                @foreach ($usaha as $item)
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pendapatan {{ $item->nama
                        }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $item->total }} </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    @php
                    $totalpendapatan=$totalpendapatan+$item->total;
                    @endphp
                </tr>
                @endforeach


                {{-- TOTAL PENDAPATAN JASA--}}
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Pendapatan Jasa</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $totalpendapatan }}
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $totalpendapatan }} </td>

                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ---------------------------------------- --}}

                {{-- PENDAPATAN LAINNYA--}}

                {{-- GAP KOSONG --}}


                {{-- ---------------------------------------- --}}

                {{-- PENDAPATAN DAGANG--}}

                <tr class="border-b border-neutral-400">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">B.
                        Laba Kotor</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $totalpendapatan }}</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- BEBAN--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">D.
                        Beban</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK BEBAN --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">1. Beban
                        Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Gaji</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp500.000</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Perlengkapan</td>
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
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Penyusutan
                        Inventaris</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Operasional Lainnya
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                </tr>

                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ANAK BEBAN --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">2. Beban
                        Lain-Lain</td>
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
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Administrasi Bank
                    </td>
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
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Lain-lain</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp9.000.000 </td>
                </tr>


                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                {{-- TOTAL BEBAN --}}
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Total Beban (1+2)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">RP. Berapa kek</td>

                </tr>
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Laba/Rugi Bersih (C-D)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp. Berapa kek</td>

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
    </div>
</div>
</div>