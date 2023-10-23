<div>
    {{-- file ini bisa menggunkan variabel global yang ada pada livewire person.item --}}
    <tr class="bg-white border-b">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            {{ $number }}
        </th>
        <td class="px-6 py-4">
            {{ $person->nama }}
        </td>
        <td class="px-6 py-4">
            {{ $person->username }}
        </td>
        <td class="px-6 py-4">
            {{ $person->kontak }}
        </td>
        <td class="px-6 py-4">
            {{ $person->status }}
        </td>

        <td class="px-6 py-4 flex space-x-2">
            @can('ketua')
            {{-- jika button diklik, maka jalankan fungsi dengan tanda edit-modal beserta kirimkan data dengan nama
            person yang berisikan data $person --}}
            {{-- dimana fungsi dengan tanda ini berada di livewire person.addeditmodal --}}
            <button wire:click="$dispatch('edit-modal', { person: {{ $person }} })">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6 text-cyan-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>

            {{-- sama seperti penjelasan sebelumnya, namun fungsi dengan tanda kali ini berada di livewire
            person.resetdeletemodal --}}
            <button
                wire:click="$dispatch('reset-modal', { person: '{{ $person->id_person }}', nama: '{{ $person->nama }}' })">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6 text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </button>

            {{-- untuk bagian ini berada di file yang sama seperti button reset modal --}}
            <button
                wire:click="$dispatch('delete-modal', { person: '{{ $person->id_person }}', nama: '{{ $person->nama }}' })">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
            @endcan
        </td>
    </tr>
</div>