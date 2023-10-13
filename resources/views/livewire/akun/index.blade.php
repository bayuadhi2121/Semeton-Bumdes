<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Data Akun</h2>

    <div class="mb-4 flex justify-between">
        <button wire:click="$dispatch('add-modal')" type="button"
            class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah</button>
        <div class="relative w-1/4">
            <input type="text" id="simple-search" wire:model.live="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                placeholder="Cari Jenis Pendapatan..." required>

            @if ($search != '')
            <button wire:click="resetSearch()"
                class="text-gray-500 absolute right-2 bottom-4 font-medium rounded-lg text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            @endif
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
                        Id Akun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Akun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($akun as $item)
                @livewire('Akun.item', ['number' => $akun->firstItem() + $loop->index, 'akun' => $item], key(null))
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $akun->links() }}
    </div>

    <!-- Add data modal -->
    @livewire('Akun.add-edit-modal')

    {{-- Confirmation modal --}}
    @livewire('Akun.delete-modal')
</div>