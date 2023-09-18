<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Detail Transaksi {{ $status
        }}</h2>

    <div class="mb-4 flex flex-row justify-between items-center">
        <dt class="text-gray-800 font-semibold pr-2">Tanggal </dt>
        <div class="w-full bg-gray-200 p-2 pl-4 mr-2">

            <dd class="text-gray-800">{{ $transaksi->tanggal }}</dd>
        </div>
        <dt class="text-gray-800 font-semibold pr-2">Keterangan</dt>
        <div class="w-full bg-gray-200 p-2 pl-4 mr-2">

            <dd class="text-gray-800">{{ $transaksi->keterangan == '' ? '-' : $transaksi->keterangan }} </dd>
        </div>
    </div>


    <div>

        <button wire:click="$dispatch('add-modal')" type="button"
            class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah</button>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="w-1 px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>

                </tr>
            </thead>
            <tbody>
                @forelse ($jualbeli as $item)
                @livewire('transaksi.detail.item', ['number' => $jualbeli->firstItem() + $loop->index, 'jualbeli' =>
                $item,'status'=>$status],
                key(null))

                @if ($loop->last)
                <tr>
                    <td colspan="4" class="px-6 py-4 font-medium text-center text-gray-800">Total Semua</td>
                    <td class="px-6 py-4 font-medium text-gray-800">Ini total</td>
                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>

    <form class="pt-6 w-2/5">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Total Transaksi
            </label>
            <input type="text" value="0" id="small-input"
                class="total basis-2/5 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>


        </div>
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Dibayarkan
            </label>
            <input type="number" placeholder="0" id="small-input"
                class="dibayarkan basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2">
            <div class="basis-1/5">

            </div>

        </div>
        <hr class="pb-2 border-gray-400 mr-3 w-9/12">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Sisa
            </label>
            <input type="text" id="small-input"
                class="sisa basis-2/5 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>
            <div class="basis-1/5">

                <button type="button"
                    class=" text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">Simpan</button>
            </div>

        </div>


    </form>
    {{-- , ['usaha' => $usaha, 'status' => $status, 'mode' => $mode] --}}
    <!-- Add data modal -->
    @livewire('transaksi.detail .add-edit-modal',['status'=>$status,'transaksi'=>$id_transaksi])
    {{-- Confirmation modal --}}
    <div id="confirmation-modal" tabindex="-1" data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah anda yakin?</h3>
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Lanjut
                    </button>
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Your JavaScript code here

        //perhitungan sisa
        function calculateSisa() {

            var totalValue = parseFloat(document.querySelector('.total').value) || 0;
            var dibayarkanValue = parseFloat(document.querySelector('.dibayarkan').value) || 0;

            var sisaValue = totalValue - dibayarkanValue;
            var formattedSisaValue = sisaValue.toLocaleString();
            document.querySelector('.sisa').value = sisaValue.toFixed(0);
        }

        document.querySelector('.dibayarkan').addEventListener('input', calculateSisa);


        calculateSisa();
    </script>
</div>