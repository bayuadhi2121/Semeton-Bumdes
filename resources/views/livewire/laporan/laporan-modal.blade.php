<div>
    <div class="p-6">
        <div class=""></div>
        <h2 class="text-center text-2xl font-medium pb-4">LAPORAN PERUBAHAN MODAL <br>BUMDES PUTRI NYALE KUTA</h2>
        <table class="min-w-full border text-sm table-auto border-neutral-500">
            <tbody>
                {{-- HEADER --}}
                <tr class="border-b border-neutral-500 bg-cyan-200">
                    <td class="whitespace-nowrap  border-r pl-1 pr-0 py-2 font-medium border-neutral-500">
                        No
                    </td>
                    <td class="whitespace-nowrap border-r px-2 py-2 font-medium border-neutral-500">
                        Keterangan
                    </td>
                    <td class="whitespace-nowrap border-r px-2 py-2 font-medium border-neutral-500">
                        Jumlah
                    </td>
                </tr>

                <tr class=" border-b border-neutral-500">
                    <td rowspan="2" class="whitespace-nowrap border-r pl-1 pr-0 font-medium py-2 border-neutral-500">
                        1
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Saldo Modal Awal
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Rp.
                    </td>
                </tr>


                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Penambahan (setor modal, Laba)
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Rp.{{ $lababersih }}
                    </td>
                </tr>
                <tr class=" border-b border-neutral-500">
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Pengurangan (prive, rugi)
                    </td>
                    <td class="whitespace-nowrap border-r px-2 font-medium py-2 border-neutral-500">
                        Rp.{{ $prive->total ?? 0 }}
                    </td>
                </tr>

                {{-- TOTAL PENDPATAN OPERASIONAL --}}
                <tr class="border-b border-neutral-500 font-medium bg-cyan-200">
                    <td colspan="2" class="text-center whitespace-nowrap border-r py-2  border-neutral-500 ">
                        Total Perubahan Modal
                    </td>
                    <td class="whitespace-nowrap border-r px-2  py-2 border-neutral-500">
                        Rp.
                    </td>
                </tr>
                {{-- GAP KOSONG --}}
                <tr class="border-b border-neutral-500 text-center ">
                    <td colspan="3" class="whitespace-nowrap border-r py-2 font-bold border-neutral-500">

                    </td>
                </tr>

                {{-- TOTAL PENDAPATAN --}}
                <tr class="border-b border-neutral-500 bg-cyan-300">
                    <td colspan="2" class="whitespace-nowrap border-r text-center  py-2 font-bold border-neutral-500 ">
                        Saldo Modal Akhir
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
    </div>