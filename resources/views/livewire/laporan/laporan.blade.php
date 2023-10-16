<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Laporan Keuangan Bumdes</h2>

    <h2 class="text-2xl font-medium text-center">Bumdes Kuta</h2>
    <h2 class="text-lg font-medium mb-5 pb-1 text-center">Pertanggungjawaban Keuangan Bumdes</h2>

    <form wire:submit.prevent='print' class="flex" method="POST" data-target="_blank">

        <div class="basis-1/2 p-4 bg-neutral-100 rounded-lg m-2">

            <div class="flex items-center mb-2 ">
                <input id="default-radio-1" type="radio" value="neraca" name="default-radio" wire:model="laporan"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 mr-2">
                <label for="default-radio-1" class="ml-2 text-base font-medium text-gray-900 ">Laporan
                    Neraca</label>
            </div>

            <h3 class="ml-6 pl-2 text-base font-medium text-gray-900 mb-2">Laporan Laba Rugi</h3>
            <div class="ml-6 pl-2">
                <div class="flex items-center mb-2">
                    <input id="default-radio-2" type="radio" value="Jasa" name="default-radio" wire:model="laporan"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 mr-2">
                    <label for="default-radio-2" class="ml-2 text-base font-medium text-gray-900 ">Jasa</label>
                </div>
                <div class="flex items-center mb-2">
                    <input id="default-radio-3" type="radio" value="Dagang" name="default-radio" wire:model="laporan"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 mr-2">
                    <label for="default-radio-3" class="ml-2 text-base font-medium text-gray-900 ">Dagang</label>
                </div>
                <div class="flex items-center mb-2">
                    <input id="default-radio-4" type="radio" value="Gabungan" name="default-radio" wire:model="laporan"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 mr-2">
                    <label for="default-radio-4" class="ml-2 text-base font-medium text-gray-900 ">Gabungan</label>
                </div>
            </div>
            <div class="flex items-center mb-2">
                <input id="default-radio-5" type="radio" value="modal" name="default-radio" wire:model="laporan"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 mr-2">
                <label for="default-radio-5" class="ml-2 text-base font-medium text-gray-900 ">Laporan Perubahan
                    Modal</label>
            </div>


        </div>
        <div class="basis-1/2 p-4 bg-neutral-100 rounded-lg m-2">
            <h3 class="text-base font-medium text-gray-900">Rentang tanggal </h3>
            <div class="flex mt-4 items-center">
                <div class="relative mr-2">
                    <input type="date" id="floating_outlined"
                        class="px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-neutral-100 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Awal</label>
                </div>
                <div class="relative mr-2">
                    <input type="date" id="floating_outlined"
                        class="px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-neutral-100 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Akhir</label>
                </div>



            </div>
            <h3 class="text-base pt-2 text-gray-900 mb-2">Nama file: </h3>
            <div>
                <button type="submit"
                    class="text-white bg-cyan-700 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cetak</button>
            </div>

        </div>
    </form>

</div>