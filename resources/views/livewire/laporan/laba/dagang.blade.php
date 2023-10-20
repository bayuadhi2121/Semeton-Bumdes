<div>
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN LABA RUGI <br>BUMDES PUTRI NYALE KUTA</h2>
        <table class="min-w-full border text-sm table-auto border-neutral-400 ml-1">
            <tbody>

                {{-- PENDAPATAN DAGANG--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">A.
                        Pendapatan Dagang</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>
                @php
                $dagang=0;
                @endphp
                {{-- ANAK PENDAPATAN DAGANG --}}
                @foreach ($usaha as $item)

                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">{{
                        $loop->iteration }}. Usaha {{
                        $item->nama }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Penjualan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->penjualan }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pembelian</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->pembelian }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Barang Tersedia Terjual
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->total_jual }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                {{-- LABA RUGI--}}

                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r pl-6 px-2  py-2 border-neutral-400">Laba/Rugi</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{
                        $item->penjualan-($item->pembelian+$item->total_jual) }} </td>

                    @php
                    $dagang=$dagang+$item->penjualan-($item->pembelian+$item->total_jual);
                    @endphp

                </tr>
                @endforeach
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Pendapatan Dagang
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $dagang }}</td>

                </tr>

                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ---------------------------------------- --}}

                {{-- PENDAPATAN LAINNYA--}}

                {{-- ---------------------------------------- --}}

                <tr class="border-b border-neutral-400">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">C.
                        Laba Kotor</td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Rp.{{$dagang
                        }}</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    --}}
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
                @php
                $totalbeban=0;
                @endphp
                @foreach ($beban as $item)
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">{{ $item->nama }}
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item ->total }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    @php
                    $totalbeban=$totalbeban+$item->total;
                    @endphp
                </tr>
                @endforeach

                {{-- GAP KOSONG --}}


                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                {{-- TOTAL BEBAN --}}
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Total
                        Beban</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $totalbeban }}</td>

                </tr>
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Laba/Rugi Bersih (C-D)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $dagang-$totalbeban }}
                    </td>

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