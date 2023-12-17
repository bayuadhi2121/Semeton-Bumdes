<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Data Hutang
        {{ !$is_hutang ? 'Pelanggan' : 'Bumdes' }}</h2>

    <div class="mb-4 flex justify-between">

        <div class="relative w-1/4">
            <input type="text" id="simple-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                placeholder="Cari Hutang..." required>
        </div>

        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button wire:click='setHutang()' type="button" @class([
                'rounded-l-md px-4 py-2 text-sm font-medium text-white border border-gray-200 hover:bg-cyan-900',
                'bg-cyan-400' => $is_hutang,
                'bg-cyan-900' => !$is_hutang,
            ])>
                Hutang Pelanggan
            </button>

            <button wire:click='setHutang(1)' type="button" @class([
                'rounded-r-md px-4 py-2 text-sm font-medium text-white border border-gray-200 hover:bg-cyan-900',
                'bg-cyan-400' => !$is_hutang,
                'bg-cyan-900' => $is_hutang,
            ])>
                Hutang Bumdes
            </button>
        </div>

    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="w-1 px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sisa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hutang as $item)
                    @livewire('hutang.item', ['number' => $hutang->firstItem() + $loop->index, 'hutang' => $item], key(null))

                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $hutang->links() }}
    </div>

    <!-- Add data modal -->
    @livewire('hutang.edit-modal')
</div>
