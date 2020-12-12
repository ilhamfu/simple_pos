<div class="w-full mt-5">
    <div class="table-container w-full">

        <table class="w-full">
            <thead>
                <tr class="bg-black text-white">
                    <th class="w-10">#</th>
                    <th class="">Tgl Transaksi</th>
                    <th class="">Jenis Transaksi</th>
                    <th class="">Oleh</th>
                    <th class="">Total</th>
                    <th class="">Operasi</th>

                </tr>
            </thead>
            <tbody>

                @forelse ($items as $item)
                <tr class="table-row">
                    <td class="w-10">{{$loop->index+1}}</td>
                    <td class="border-l-2 border-r-2 border-black">{{$item->created_at}}</td>
                    <td class="border-l-2 border-r-2 border-black">{{$item->transaksiMasuk?"Masuk":"Keluar"}}</td>
                    <td class="border-l-2 border-r-2 border-black">{{$item->pelaku_transaksi}}</td>
                    <td class="border-l-2 border-r-2 border-black">{{$item->total}}</td>
                    <td class="border-l-2 border-r-2 border-black text-center w-16"><button
                            class="bg-black w-full text-white font-bold hover:text-black hover:bg-transparent active:bg-gray-500"
                            wire:click="delete({{$item->id}})">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr class="table-row">
                    <td class="text-center" colspan="6">Kosong</td>
                </tr>
                @endforelse


            </tbody>


        </table>
    </div>
</div>