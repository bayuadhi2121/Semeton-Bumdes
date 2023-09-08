<div>
    @if($show)
    <div
        class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full bg-black bg-opacity-50 flex justify-center items-center">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" wire:click='closeModal'
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 wire:ignore.self class="mb-4 text-xl font-medium text-gray-900">{{ $title }} Data
                        Pengelola
                    </h3>
                    <form wire:submit.prevent="{{ $mode }}  " class="space-y-6">
                        <div>
                            <div class="relative">
                                <div>
                                    <input wire:model.live="nama" type="text" id="nama" name="nama"
                                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                        placeholder=" " />

                                    <label for="nama"
                                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama</label>
                                </div>
                            </div>
                            @error('nama')
                            <span class="error text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <div class="relative">
                                <input wire:model.live="kontak" type="text" id="kontak" name="kontak"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                    placeholder="081111111111" />
                                <label for="kontak"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Kontak
                                    (Opsional)</label>
                            </div>
                            @error('kontak')
                            <span class="error text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input wire:model.live="status" id="bendahara" type="radio" value="Bendahara"
                                            name="list-radio" class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300">
                                        <label for="bendahara"
                                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Bendahara</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">
                                        <input wire:model.live="status" id="akuntan" type="radio" value="Akuntan"
                                            name="list-radio" class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300">
                                        <label for="akuntan"
                                            class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Akuntan</label>
                                    </div>
                                </li>

                            </ul>
                            @error('status')
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