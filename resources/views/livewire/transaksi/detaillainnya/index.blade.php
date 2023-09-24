<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Detail Transaksi Lainnya</h2>


    <div class="mb-4 flex flex-row justify-between items-center">
        <dt class="text-gray-800 font-semibold pr-2">Tanggal </dt>
        <div class="w-full bg-gray-200 p-2 pl-4 mr-2">

            <dd class="text-gray-800">{{$transaksi->tanggal}}</dd>
        </div>
        <dt class="text-gray-800 font-semibold pr-2">Keterangan</dt>
        <div class="w-full bg-gray-200 p-2 pl-4 mr-2">

            <dd class="text-gray-800">{{$keterangan ?? " "}}</dd>
        </div>
    </div>


    <div>

        <button wire:click="$dispatch('add-modal')" type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah</button>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 border-gray-400 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class=" w-1  px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Nama Akun
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Debit
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Kredit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detail as $item)
                @livewire('Transaksi.Detaillainnya.Item', ['number' => $detail->firstItem() + $loop->index, 'detail' => $item], key(null))
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="2" class="px-6 py-4 text-gray-800 font-medium text-center">Balance</td>
                </tr>
            </tbody>
        </table>
    </div>



    <!-- Add data modal -->
    @livewire('transaksi.detaillainnya.add-edit-modal',['transaksi'=>$transaksi])


    @livewire('transaksi.detaillainnya.delete-modal')



</div>