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
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
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
                    <td colspan="1" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">B.
                        Laba Kotor</td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $totalpendapatan }}</td>
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- BEBAN--}}
                <tr class="border-b border-neutral-400">
                    <td colspan="4" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">C.
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
                $operasional=0;
                @endphp
                @foreach ($beban as $item)
                <tr class=" border-b border-neutral-400">
                    <td class="whitespace-nowrap border-r pl-6 pr-0  py-2 border-neutral-400">{{ $item->nama }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp{{ $item->total }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>
                @php
                $operasional=$operasional+$item->total;
                @endphp
                @endforeach
                <tr class="border-b border-neutral-400 font-medium">
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Total Beban Operasional</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"> </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $operasional }}</td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400"></td>
                </tr>

                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-400 text-center ">
                    <td colspan="4" class="whitespace-nowrap border-r py-2 font-bold border-neutral-400"></td>
                </tr>

                {{-- ANAK BEBAN --}}



                {{-- GAP KOSONG --}}

                {{-- TOTAL BEBAN --}}
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Total Beban </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">Rp.{{ $operasional }}</td>

                </tr>
                <tr class="border-b border-neutral-400 font-medium bg-cyan-300">
                    <td colspan="3" class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-400">
                        Laba/Rugi Bersih </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-400">
                        Rp.{{$operasional-$totalpendapatan}}</td>

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