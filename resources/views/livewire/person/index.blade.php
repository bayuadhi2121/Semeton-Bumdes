<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Data Pengelola</h2>
    <div class="mb-4 flex justify-between">
        {{-- wire:click="$dispatch('add-modal')" code is used to trigger a method in response to an event named
        "add-modal" in AddEditModal Component --}}
        <button wire:click="$dispatch('add-modal')" type="button" data-modal-target="add-data-modal"
            data-modal-show="add-data-modal"
            class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah</button>

        <div class="relative w-1/4">
            <input wire:model.live="search" type="text" id="simple-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                placeholder="Cari pengelola..." required>
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
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kontak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengelola as $item)
                @livewire('person.item-table', ['number' => $pengelola->firstItem() + $loop->index, 'person' => $item],
                key($item->id))
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $pengelola->links() }}
    </div>

    <!-- Add data modal -->
    @livewire('Person.add-edit-modal')

    {{-- Confirmation modal --}}
    @livewire('Person.reset-delete-modal')

</div>