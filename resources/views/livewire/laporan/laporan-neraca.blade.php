<div>
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN NERACA <br>BUMDES PUTRI NYALE KUTA</h2>
        <div class="flex">
            <div class="basis-1/2 mr-2">
                <table class="min-w-full border text-sm table-auto border-neutral-400 mr-1">
                    <tbody>
                        {{-- Judul --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3"
                                class="whitespace-nowrap border-r py-2 font-bold border-neutral-400 bg-cyan-400">AKTIVA
                            </td>
                        </tr>
                        <tr class="border-b border-neutral-400 bg-cyan-200">
                            <td colspan="3"
                                class="whitespace-nowrap border-r py-2 font-bold border-neutral-400 text-center">Asset
                            </td>
                        </tr>
                        @php
                        $assetlancar=0;
                        @endphp

                        {{-- ASET LANCAR--}}
                        <tr class="border-b border-neutral-400">
                            <td colspan="3"
                                class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">1.
                                Asset
                                Lancar</td>
                            {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                            </td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                            --}}
                        </tr>

                        {{-- ANAK ASET LANCAR --}}
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Kas Umum</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($umum->total
                                ?? 0)
                            </td>
                            @php
                            $assetlancar=$assetlancar+$umum->total ?? 0;
                            @endphp
                        </tr>

                        @foreach ($akunKas as $item)
                        <tr class="border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0 py-2 border-neutral-400">{{ $item->nama }}
                            </td>
                            <td class="whitespace-nowrap border-r px-2 py-2 border-neutral-400">
                                @currency($item->total ?? 0) </td>

                        </tr>
                        @php
                        $assetlancar=$assetlancar+$item->total ?? 0;
                        @endphp
                        @endforeach

                        @foreach ($persediaan as $item)
                        <tr class="border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0 py-2 border-neutral-400">{{ $item->nama }}
                            </td>
                            <td class="whitespace-nowrap border-r px-2 py-2 border-neutral-400">
                                @currency($item->total ?? 0) </td>

                        </tr>
                        @php
                        $assetlancar=$assetlancar+$item->total ?? 0;
                        @endphp
                        @endforeach
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Piutang</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($piutang ??
                                0)
                            </td>
                            @php
                            $assetlancar=$assetlancar+$piutang;
                            @endphp
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Komputer</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($komputer->total ?? 0)
                            </td>
                            @php
                            $assetlancar=$assetlancar+$komputer->total ?? 0;
                            @endphp
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Perlengkapan</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($perlengkapan->total ?? 0 )</td>
                            @php
                            $assetlancar=$assetlancar+$perlengkapan->total ?? 0;
                            @endphp
                        </tr>




                        {{-- TOTAL ASET LANCAR --}}
                        <tr class="border-b border-neutral-400 font-medium">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Aset
                                Lancar</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($assetlancar) </td>

                        </tr>
                        {{-- GAP KOSONG --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                        </tr>

                        {{-- ---------------------------------------- --}}

                        {{-- ASET TIDAK LANCAR--}}
                        <tr class="border-b border-neutral-400">
                            <td colspan="3"
                                class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">2.
                                Asset
                                Tidak Lancar</td>

                        </tr>
                        @php
                        $assettak=$tanah->total ?? 0 + $gedung->total ?? 0 +$assettetap->total
                        ?? 0 + $penyusutan->total ?? 0 + $kendaraan->total ?? 0;
                        @endphp

                        {{-- ANAK ASET TIDAK LANCAR --}}
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Tanah</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($tanah->total
                                ?? 0)
                            </td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Gedung dan
                                Bangunan
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency(
                                $gedung->total ?? 0)</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Kendaraan</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($kendaraan->total ?? 0 )</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Akumulasi
                                Penyusutan
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency(
                                $penyusutan->total ?? 0 )</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Aset Tetap Lainnya
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($assettetap->total ?? 0 )</td>
                        </tr>

                        {{-- TOTAL ASET TIDAK LANCAR --}}
                        <tr class="border-b border-neutral-400 font-medium">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Aset
                                Tidak Lancar</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($assettak)</td>

                        </tr>
                        {{-- GAP KOSONG --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                        </tr>


                        {{-- ------------------------------------------ --}}

                        {{-- ASET LAIN LAIN--}}
                        <tr class="border-b border-neutral-400">
                            <td colspan="3"
                                class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">3.
                                Asset
                                Lain-Lain</td>
                            {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                            </td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                            --}}
                        </tr>
                        @php
                        $asetlain=$assetlain->total ?? 0;
                        @endphp
                        {{-- ANAK ASET Lain-Lain --}}
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Aset Lain Lain
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($assetlain->total ?? 0) </td>
                        </tr>

                        {{-- TOTAL ASET TIDAK LANCAR --}}
                        <tr class="border-b border-neutral-400 font-medium">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Aset
                                lain-lain</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($asetlain)</td>

                        </tr>
                        @php
                        $aktiva=$asetlain+$assettak+$assetlancar;
                        @endphp
                        <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Aset
                                (1+2+3)</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($aktiva)</td>

                        </tr>
                        {{-- GAP KOSONG --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                        </tr>



                    </tbody>
                </table>
            </div>
            <div class="basis-1/2 ">
                <table class="min-w-full border text-sm table-auto border-neutral-400 ml-1">
                    <tbody>

                        {{-- Judul --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3"
                                class="whitespace-nowrap border-r py-2 font-bold border-neutral-400 bg-cyan-400">PASIVA
                            </td>
                        </tr>
                        <tr class="border-b border-neutral-400 bg-cyan-200">
                            <td colspan="3"
                                class="whitespace-nowrap border-r py-2 font-bold border-neutral-400 text-center">Hutang
                            </td>
                        </tr>
                        @php
                        $pendek=$hutangusaha ??0+$gaji->total ?? 0+$pihak3jkpendek->total ??
                        0+$jkpendeklainnya->total ?? 0+$sewagedung->total ?? 0+$listrik->total ?? 0;
                        @endphp

                        {{-- HUTANG--}}
                        <tr class="border-b border-neutral-400">
                            <td colspan="3"
                                class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">1.
                                Hutang
                                Jangka Pendek</td>
                            {{-- <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                            </td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                            --}}
                        </tr>

                        {{-- ANAK HUTANG --}}
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Usaha</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($hutangusaha)
                            </td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Gaji dan
                                Tunjangan</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($gaji->total
                                ?? 0)
                            </td>

                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang kepada
                                Pihak
                                Ketiga Jk. Pendek</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($pihak3jkpendek->total ?? 0)</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Jangka
                                Pendek
                                Lainnya</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($jkpendeklainnya->total ?? 0 )</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang sewa Gedung
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($sewagedung->total ?? 0 )</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Listrik
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($listrik->total ?? 0)</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Telpon</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($telpon->total ?? 0)</td>
                        </tr>



                        {{-- HUTANG JANGKA PENDEK --}}
                        <tr class="border-b border-neutral-400 font-medium">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Hutang Jangka Pendek</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($pendek )</td>

                        </tr>
                        {{-- GAP KOSONG --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                        </tr>

                        {{-- ---------------------------------------- --}}

                        {{-- HUTANG JANGKA PANJANG--}}
                        <tr class="border-b border-neutral-400">
                            <td colspan="3"
                                class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">2.
                                Hutang
                                Jangka Panjang</td>
                        </tr>
                        @php
                        $panjang=$bank->total ?? 0 + $modal->total ?? 0 +$hasil->total ?? 0 + $pihak3->total ?? 0 +
                        $pajak->total ?? 0;
                        @endphp
                        {{-- ANAK HUTANG JANGKA PANJANG --}}
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Bank</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($bank->total
                                ?? 0)
                            </td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Modal</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($modal->total
                                ?? 0)</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Bagi Hasil
                            </td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($hasil->total
                                ?? 0)</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Kepada
                                Pihak
                                ketiga</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                                @currency($pihak3->total ?? 0)</td>
                        </tr>
                        <tr class=" border-b border-neutral-400">
                            <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">Hutang Pajak</td>
                            <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">@currency($pajak->total
                                ?? 0)</td>
                        </tr>

                        {{-- TOTAL HUTANG JANGKA PANJANG --}}
                        <tr class="border-b border-neutral-400 font-medium">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Hutang Jangka Panjang</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency(
                                $panjang )</td>

                        </tr>
                        @php
                        $hutang=$pendek+$panjang;
                        @endphp
                        <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Total
                                Hutang (1+2+3)</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($hutang)
                            </td>

                        </tr>
                        {{-- GAP KOSONG --}}
                        <tr class="border-b border-neutral-400 text-center ">
                            <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                        </tr>
                        <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                            <td colspan="3"
                                class="whitespace-nowrap  border-r pl-1 text-center pr-0 py-2 font-medium border-neutral-400">
                                Modal</td>

                        </tr>
                        <tr class="border-b border-neutral-400 font-medium">
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">Modal
                                Akhir</td>
                            <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                                @currency($modalAwal ? $modalAwal->Nilai : 0 )</td>

                        </tr>
                        @php
                        $modal=$modalAwal ? $modalAwal->Nilai : 0;
                        $pasiva=$hutang + $modal;
                        @endphp
                    </tbody>
                </table>
            </div>

        </div>
        <table class="min-w-full border text-sm table-auto border-neutral-400 mt-2">
            <tbody>
                {{-- PASIVA AKTIVA TOTAL --}}
                <tr class="border-b border-neutral-400 bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 text-center border-neutral-400 font-bold ">
                        Total
                        Aktiva</td>
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400 px-1">
                        @currency($aktifa)
                    </td>
                    <td colspan="3" class="whitespace-nowrap border-r py-2 text-center border-neutral-400 font-bold ">
                        Total
                        Pasiva</td>
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400 px-1">
                        @currency($pasiva)</td>
                </tr>
            <tbody>
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
        <script>
            // window.print();
        </script>
    </div>