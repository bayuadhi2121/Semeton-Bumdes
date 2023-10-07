<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Detail Transaksi Lainnya</h2>


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
        <button wire:click="addDetail" type="button"
            class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Tambah</button>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 border-gray-400 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class=" w-1 px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Nama Akun
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Debit
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Kredit
                    </th>
                    @if (!$transaksi->saved)
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($jumum as $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4 w-6/12">
                            <div class="basis-1/2 relative">
                                <input wire:model.live.debounce.3s="nama.{{ $loop->index }}"
                                    wire:click="showAkun({{ $loop->index }})"
                                    wire:click.outside="closeAkun({{ $loop->index }})" type="text"
                                    class="w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                    placeholder=" " @if ($transaksi->saved) disabled @endif />

                                @if ($akun->contains('id_akun', $jumum[$loop->index]['id_akun']) || $status[$loop->index])
                                    <div
                                        class="text-green-500 absolute right-2 bottom-2 font-medium rounded-lg text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                @else
                                    @if ($nama[$loop->index] != '')
                                        <div
                                            class="text-red-500 absolute right-2 bottom-2 font-medium rounded-lg text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                    @endif
                                @endif

                                @if ($showList[$loop->index])
                                    <div class="absolute w-full z-50">
                                        <div class="bg-white p-2 border-2 shadow-lg rounded-lg mt-2">
                                            @forelse ($akun as $item)
                                                <div wire:click="setAkun('{{ $loop->parent->index }}', '{{ $item->id_akun }}', '{{ $item->nama }}')"
                                                    class="py-2 px-3 rounded-lg hover:bg-gray-200 hover:cursor-pointer">
                                                    {{ $item->nama }}
                                                </div>
                                            @empty
                                                @if (!$akun->contains('nama', $nama[$loop->index]) && $nama[$loop->index] != '')
                                                    <div wire:click="createAkun('{{ $loop->index }}')"
                                                        class="flex items-center space-x-2 py-2 px-3 rounded-lg hover:bg-gray-200 hover:cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="text-gray-600 w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span>{{ $nama[$loop->index] }}</span>
                                                    </div>
                                                @else
                                                    <div class="flex items-center space-x-2 py-2 px-3 rounded-lg">
                                                        <span>Tidak ada data</span>
                                                    </div>
                                                @endif
                                            @endforelse
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 text-center">
                            <input wire:model="jumum.{{ $loop->index }}.debit" type="text" name="debit"
                                class="text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                value="{{ $item['debit'] }}" @if ($transaksi->saved) disabled @endif />
                        </td>
                        <td class="px-6 text-center">
                            <input wire:model="jumum.{{ $loop->index }}.kredit" type="text" name="kredit"
                                class="text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-600 peer"
                                value="{{ $item['kredit'] }}" @if ($transaksi->saved) disabled @endif />
                        </td>
                        @if (!$transaksi->saved)
                            <td class="px-6 py-4 flex space-x-2">
                                <button wire:click="deleteDetail({{ $loop->index }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-6 h-6 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 font-medium text-center">Data
                            Kosong</td>
                    </tr>
                @endforelse
                <tr @class([
                    'bg-cyan-100' => $balance,
                    'bg-red-100' => !$balance,
                ])>
                    <td colspan="2" class="px-6 py-4 text-gray-800 font-medium text-center">Balance</td>
                    <td class="py-4 text-gray-800 font-medium text-center">{{ $totalDebit }}</td>
                    <td class="py-4 text-gray-800 font-medium text-center">{{ $totalKredit }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        @if ($errors->any())
            <span class="error text-sm text-red-500">
                Pastikan semua data terisi, coba lagi.
            </span>
        @endif
    </div>

    @if (!$transaksi->saved)
        <button @if ($balance) wire:click="save" @endif type="button"
            @class([
                'mt-3 text-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2',
                'bg-cyan-600 hover:bg-cyan-700' => $balance,
                'bg-red-600 hover:cursor-default' => !$balance,
            ])>Simpan</button>

        <script>
            window.onbeforeunload = function() {
                return confirm("Data belum disimpan. Data akan hilang jika keluar atau muat ulang halaman ini.");
            };
        </script>
    @endif

</div>
