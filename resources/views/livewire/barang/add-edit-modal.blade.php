<div>
    @if ($show)
    <div
        class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full bg-black bg-opacity-50 flex justify-center items-center">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" wire:click="closeModal"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">{{ $title }} Data Barang</h3>

                    <form wire:submit.prevent="{{ $mode }}" class="space-y-6">
                        <div>
                            <div class="relative">
                                <input type="text" id="nama" name="nama" wire:model='nama'
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                    placeholder=" " />
                                <label for="nama"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                                    Barang</label>
                            </div>
                            @error('nama')
                            <span class="error text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative">
                            <input type="number" min="0" id="harga" name="harga" wire:model='harga'
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                placeholder=" " />
                            <label for="harga"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Harga
                                Barang</label>
                            @error('harga')
                            <span class="error text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative">
                            <input type="number" min="0" id="untung" name="untung" wire:model='untung'
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                placeholder=" " />
                            <label for="untung"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Untung</label>
                            @error('untung')
                            <span class="error text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative">
                            <input type="number" min="0" id="stok" name="stok" wire:model='stok'
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                placeholder=" " />
                            <label for="stok"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Stok</label>
                        </div>

                        <div class="relative">
                            <input type="number" min="0" id="stok_min" name="stok_min" wire:model='stok_min'
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                placeholder=" " />
                            <label for="stok_min"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Stok
                                Minimum</label>
                            @error('stok_min')
                            <span class="error text-sm text-red-500">{{ $message }}</span>
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