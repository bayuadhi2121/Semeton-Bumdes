<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Detail Beban</h2>

    <div class="mb-4 flex flex-row justify-between items-center">
        <dt class="text-gray-800 font-semibold pr-2">Tanggal </dt>
        <div class="w-full bg-gray-200 p-2 pl-4 mr-2">

            <dd class="text-gray-800">{{ $transaksi->tanggal }}</dd>
        </div>
        <dt class="text-gray-800 font-semibold pr-2">Keterangan</dt>
        <div class="w-full bg-gray-200 p-2 pl-4 mr-2">

            <dd class="text-gray-800">{{ $transaksi->keterangan == '' ? '-' : $transaksi->keterangan }}</dd>
        </div>
    </div>


    <div>

        <button wire:click="$dispatch('add-modal')" type="button"
            class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm mb-6 px-5 py-2.5 mr-2 mb-2">Tambah</button>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="w-1 px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Beban
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
                    @livewire('Transaksi.Detail.Beban.item', ['number' => $loop->iteration, 'jualbeli' => $item], key(null))
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Perhitungan sisa --}}
    <form class="pt-6 w-2/5">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Total Transaksi
            </label>
            <input wire:model='total' type="text" id="small-input"
                class="total basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>


        </div>
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Dibayarkan
            </label>
            <input wire:model.live.debounce.2s='bayar' type="number" id="small-input"
                class="dibayarkan basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2">
            <div class="basis-1/5">

            </div>

        </div>
        <hr class="pb-2 border-gray-400 mr-3 w-9/12">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Sisa
            </label>
            <input wire:model='sisa' type="text" id="small-input"
                class="sisa basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2"
                disabled>

            <div class="basis-1/5">
                @if (!$transaksi->saved)
                    <button wire:click.prevent='saveTransaksi' type="submit"
                        class=" text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">Simpan</button>
                @endif

            </div>

        </div>
    </form>

    <!-- Add data modal -->
    @livewire('Transaksi.Detail.Beban.add-edit-modal', ['transaksi' => $transaksi->id_transaksi, 'usaha' => $transaksi->id_usaha])

    {{-- Confirmation modal --}}
    @livewire('Transaksi.Detail.Beban.delete-modal')
</div>
