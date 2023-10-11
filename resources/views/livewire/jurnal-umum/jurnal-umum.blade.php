<div>
    <h2 class="text-2xl font-medium mb-5 pb-1 flex flex-inline border-b-4 border-cyan-500">Jurnal</h2>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="w-1 px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Akun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Debit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kredit
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurnal as $item)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">

                    </th>
                    <td class="px-6 py-4">
                        {{$item->nama}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->debit}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->kredit}}
                    </td>
                    <td class="px-6 py-4">

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 font-medium text-center">Data Kosong</td>
                </tr>
                @endempty

            </tbody>
        </table>
    </div>

    <div class="mt-3">

    </div>


</div>