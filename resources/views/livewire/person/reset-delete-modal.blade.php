<div>
    {{-- tampilkan modal jika variabel show pada livewire bernilai true --}}
    @if ($show)
        <div
            class="fixed top-0 left-0 right-0 z-50 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50 flex justify-center items-center">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{-- tampilkan sesuai denagn value dari variabel description pada livewire resetdeletemodal --}}
                        <h3 class="mb-5 text-lg font-normal text-gray-500">{{ $description }} {{ $nama_person }}?</h3>
                        {{-- masih di resetdeletemodal, button ini akan menjalankan fungsi sesuai dengan apa yang sudah dipilih sebelumnya --}}
                        {{-- ini berhubungan denagn button reset delete pada file person.item.blade --}}
                        <button wire:click='{{ $mode }}' type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Lanjut
                        </button>
                        {{-- button ini akan menjalankan fungsi closeModal pada livewire resetdeletemodal --}}
                        <button wire:click="closeModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
