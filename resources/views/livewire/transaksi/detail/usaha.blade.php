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

    <form class="pt-6 w-2/5" wire:click.prevent='action'>
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Total Transaksi
            </label>
            <input type="text" value="{{ $total }}" id="small-input" wire:model='total'
                class="total basis-2/5 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>


        </div>
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Dibayarkan
            </label>
            <input type="number" placeholder="0" id="small-input" wire:model='dibayarkan'
                class="dibayarkan basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2">
            @if (!$transaksi->saved)
            <input type="number" placeholder="0" id="small-input" wire:model='dibayarkan'
                class="dibayarkan basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>
            @endif
            <div class="basis-1/5">
                @error('dibayarkan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <hr class="pb-2 border-gray-400 mr-3 w-9/12">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Sisa
            </label>
            <input type="text" id="small-input" wire:model='sisa'
                class="sisa basis-2/5 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>
            @if (!$transaksi->saved)
            <div class="basis-1/5">
                <button type="button"
                    class=" text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">Simpan</button>

            </div>
            @endif
        </div>


    </form>
    {{-- , ['usaha' => $usaha, 'status' => $status, 'mode' => $mode] --}}
    <!-- Add data modal -->
    @livewire('transaksi.detail .add-edit-modal',['status'=>$status,'transaksi'=>$id_transaksi])
    {{-- Confirmation modal --}}
    @livewire('transaksi.detail.delete-modal')

    <script>

    </script>
</div>