<div>
    @if ($show)
    <div
        class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full bg-black bg-opacity-50 flex justify-center items-center">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <button wire:click='closeModal' type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                    data-modal-hide="add-data-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">{{ $title }} Jenis Pendapatan</h3>
                    <form wire:submit.prevent="{{ $mode }}" class="space-y-6">
                        <div class="relative">
                            <input type="text" id="nama" name="nama" wire:model='nama'
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                placeholder=" " />
                            <label for="nama"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                            </label>

                        </div>
                        @error('nama')
                        <span class="error text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <div>
                            <div class="relative">
                                <input type="text" id="usaha" name="usaha" list="usaha" wire:model.live='search'
                                    wire:click="showUsaha" wire:click.outside="closeUsaha" autocomplete="off"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                    placeholder=" " />
                                {{-- check if user inputs character that contain 'nama' in person --}}
                                @if ($usaha->contains('nama', $search))
                                <div class="text-green-500 absolute right-2 bottom-3 font-medium rounded-lg text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                @else
                                @if ($search != '')
                                <div class="text-red-500 absolute right-2 bottom-3 font-medium rounded-lg text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                                @endif
                                @endif
                                <label for="usaha"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Usaha</label>
                                @if ($showList)
                                <div class="absolute w-full">
                                    <div class="bg-white p-2 border-2 shadow-lg rounded-lg mt-2">
                                        @forelse ($usaha as $item)
                                        <div wire:click="setUsaha('{{ $item->id_usaha }}', '{{ $item->nama }}')"
                                            class="py-2 px-3 rounded-lg hover:bg-gray-200 hover:cursor-pointer">
                                            {{ $item->nama }}
                                        </div>
                                        @empty
                                        <div class="py-2 px-3 rounded-lg hover:bg-gray-200 hover:cursor-pointer">
                                            Tidak ada Usaha
                                        </div>
                                        @endempty
                                    </div>
                                </div>
                                @endif
                            </div>
                            @error('search')
                            <span class="error text-sm text-red-500">
                                {!! $message !!}
                            </span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-cyan-700 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>