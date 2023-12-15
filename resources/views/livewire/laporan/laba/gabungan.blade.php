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
                $totaljasa=0;
                @endphp
                @foreach ($jasa as $item)
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">{{ $item->nama }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $item->total }} </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    @php
                    $totaljasa=$totaljasa+$item->total;
                    @endphp
                </tr>
                @endforeach
                {{-- TOTAL PENDAPATAN JASA--}}
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Pendapatan Jasa</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $totaljasa }}</td>

                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ---------------------------------------- --}}

                {{-- PENDAPATAN LAINNYA--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">B.
                        Pendapatan Lainnya</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK PENDAPATAN LAINNYA --}}
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pendapatan Bank</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp {{ $bank->total ?? 0 }}
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pendapatan Bagi Hasil</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp {{ $hasil->total ?? 0 }}
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Pendapatan Sumbangan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp {{ $sumbangan->total ?? 0 }}
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                {{-- TOTAL PENDAPATAN LAINNYA--}}
                @php
                $pendapatanlain=$bank->total ?? 0 +
                $hasil->total ?? 0+ $sumbangan->total ?? 0;
                @endphp
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Pendapatan Lainnya</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp {{ $pendapatanlain}} </td>

                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ---------------------------------------- --}}

                {{-- PENDAPATAN DAGANG--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">C.
                        Pendapatan Dagang</td>
                    {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td> --}}
                </tr>

                {{-- ANAK PENDAPATAN Dagang --}}
                @php
                $totaldagang=0;
                $laba=0;
                @endphp
                @foreach ($dagang as $item)
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">{{
                        $loop->iteration }}. Usaha {{ $item->nama }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Penjualan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->penjualan }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Harga Pokok Penjualan</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->pembelian }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                {{-- LABA RUGI--}}
                @php
                $laba=$laba+($item->penjualan-$item->pembelian);
                @endphp
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r pl-6 px-2  py-2 order-neutral-400">Laba/Rugi</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $laba }} </td>
                </tr>
                @php
                $totaldagang=$totaldagang+$laba;
                @endphp
                @endforeach
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                        Pendapatan Dagang(1+2)</td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">{{
                        $totaldagang }}</td>

                </tr>
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                @php
                $labakotor=$totaljasa+$pendapatanlain+$totaldagang;
                @endphp
                <tr class="border-b border-neutral-400">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">D.
                        Laba Kotor (A+B+C)</td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Rp.{{
                        $labakotor }}</td>
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- BEBAN--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">E.
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
                $bebanop=0;
                @endphp
                @foreach ($beban as $item)
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">{{ $item->nama }}
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->total }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    @php
                    $bebanop=$bebanop+$item->total;
                    @endphp
                </tr>
                @endforeach
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $bebanop }}</td>
                </tr>

                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ANAK BEBAN --}}
                @php
                $bebanlain=$denda->total ?? 0+$bunga->total ?? 0+$administrasi->total ?? 0+$lain->total ?? 0;
                @endphp
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400 font-medium">2. Beban
                        Lain-Lain</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Bunga</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $bunga->total ?? 0 }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Denda</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $denda->total ?? 0 }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban Administrasi Bank
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $administrasi->total ?? 0
                        }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Beban lain-lainnya</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $lain->total ?? 0 }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Lain-lain</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> Rp{{ $bebanlain }} </td>
                </tr>


                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>
                {{-- TOTAL BEBAN --}}
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Total Beban (1+2)</td>
                    @php
                    $totalbeban=$bebanop+$bebanlain;
                    @endphp
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">{{ $totalbeban }}</td>

                </tr>
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Laba/Rugi Bersih (D+E)</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">{{ $labakotor+$totalbeban }}
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