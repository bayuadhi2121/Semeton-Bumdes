@extends('layouts.common')

@php
    $num = $detaillainnya->firstItem();
@endphp

@section('common_content')
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Detail Transaksi Lainnya</h2>

    <div class="mb-6 flex flex-row justify-between">

        <dl class="text-gray-900 basis-3/4">
            <div class="flex flex-col pb-3">
                <dt class="text-gray-800 font-semibold">Nama Transaksi</dt>
                <dd class="text-gray-800 ">yourname@flowbite.com</dd>
            </div>
            <div class="flex flex-col pb-3">
                <dt class="text-gray-800 font-semibold">Keterangan</dt>
                <dd class="text-gray-800 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis itaque atque minima repudiandae exercitationem tempore quibusdam eaque dicta molestiae dolore.</dd>
            </div>
            
        </dl>
        
        <div class="flex justify basis-1/4">
            <div class="">
                <button type="button" data-modal-target="add-data-modal" data-modal-show="add-data-modal"
                class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah</button>
            </div>


            <div class="">
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                    placeholder="Cari Transaksi..." required>
            </div>
        </div>
        
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Akun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Debit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kredit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detaillainnya as $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $num++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->tanggal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->keterangan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->stok }}
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button data-modal-target="add-data-modal" title="Edit" data-modal-show="add-data-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6 text-cyan-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>

                            <button title="Hapus" data-modal-target="confirmation-modal" data-modal-show="confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>

                            <a href="#" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>

                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="2" class="px-6 py-4 text-gray-800 font-medium text-center">Balance</td>
                </tr>
            </tbody>
        </table>
    </div>

    <form class="pt-6 w-2/5">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Total Transaksi
            </label>
            <input type="text" value="keren" id="small-input" class="basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2" disabled>


        </div>
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Dibayarkan
            </label>
            <input type="text" id="small-input" class="basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2">
            <div class="basis-1/5">
                
                <button type="button" class= " text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-6 py-2.5 ml-2">Bayar</button>
            </div>

        </div>
        <hr class="pb-2 border-gray-400 mr-3 w-9/12">
        <div class="flex flex-row items-center justify-items-start pb-2">
            <label class="text-gray-800 font-semibold basis-4/12 ">
                Sisa
            </label>
            <input type="text" id="small-input" class="basis-2/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 mr-2">
            <div class="basis-1/5">
                
                <button type="button" class= " text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">Simpan</button>
            </div>

        </div>
        

    </form>




    <div class="mt-3">
        {{ $detaillainnya->links() }}
    </div>

    <!-- Add data modal -->
    <div id="add-data-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
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
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Detail Transaksi Lainnya</h3>
                    <form class="">
                        <div id="input-box">
                            <div id="input-data" class="flex flex-row pb-4">
                                <div class="basis-1/2 relative pr-2">
                                    <input wire:model.defer="person" type="text" id="nama" name="nama" list="person"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer" placeholder=" " />
                                    
                                    
                                    <label for="nama"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Akun</label>
                                    
                                    <datalist id="person">
                                        <option value="Person">
                                    </datalist>
                                
                                </div>
                                <div class="relative basis-1/4 pr-2">
                                    <input type="text" id="debit" name="debit" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer" placeholder=" " />
                                
                                    <label for="debit" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Debit</label>
                                
                                </div>
                                <div class="relative basis-1/4 pr-2">
                                    <input type="text" id="kredit" name="kredit"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                    placeholder=" " />
                                    <label for="kredit"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-cyan-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Kredit</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            
                            <button type="submit"
                            class=" text-white bg-cyan-700 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan              </button>
                            
                            <div class="pr-2">
                                <button type="button" class=" text-white bg-cyan-700 hover:bg-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="addRow()">Tambah Baris</button>
                                <button type="button" class=" text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center " onclick="removeRow()">Hapus Baris</button>
                            </div>
                            
                           

          
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Confirmation modal --}}
    <div id="confirmation-modal" tabindex="-1" data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah anda yakin?</h3>
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Lanjut
                    </button>
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Batal</button>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        // Your JavaScript code here
        
        function addRow(){
            newrow = document.getElementById("input-data").cloneNode(true);
            form = document.getElementById("input-box")
            form.appendChild(newrow)
        }

        function removeRow(){

            form = document.getElementById("input-box");
            if(form.childElementCount>1){

                document.getElementById("input-box").lastElementChild.remove();
            }
        }
    </script>

@endsection
