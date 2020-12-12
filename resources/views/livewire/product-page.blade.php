<div class="w-full mt-5">

    <div class="flex flex-row">
        @if ($this->updateMode)
        <button wire:click="cancelUpdate"
            class="px-2 align-middle h-8 flex items-center justify-center border border-r-0 border-black rounded-l-md font-bold spacer hover:bg-gray-300">

            Mengedit Produk {{$this->selectedId}}
        </button>
        @endif

        <input class="bg-gray-100 h-8 border-black border p-2" type="text" placeholder="Nama Produk"
            wire:model.defer="nama">
        <input class="bg-gray-100 h-8 border-black border p-2" type="number" placeholder="Stok Awal"
            wire:model.defer="stok">
        <input class="bg-gray-100 h-8 border-black border p-2" type="number" placeholder="Harga"
            wire:model.defer="harga">
        <button
            class="w-36 align-middle h-8 flex items-center justify-center border  border-black rounded-r-md hover:bg-transparent bg-black text-white font-bold hover:text-black active:bg-gray-300"
            wire:click="create">Simpan</button>
    </div>

    <div class="bg-black my-1" style="height:1px"></div>

    <div class="flex flex-row">
        <div
            class="w-24 align-middle h-8 flex items-center justify-center border border-r-0 border-black rounded-l-md font-bold">
            <label for="product-search">Cari</label>
        </div>

        <input class="w-full bg-gray-100 h-8 border-black border rounded-r-md p-2" type="text" name="product-name"
            wire:model="search" id="product-search" placeholder="Cari berdasarkan nama produk">
    </div>

    <div class="bg-black my-1" style="height:1px"></div>

    <div class="table-container w-full">

        <table class="w-full">
            <thead>
                <tr class="bg-black text-white">
                    <th class="w-10">#</th>
                    <th class="">Nama</th>
                    <th class="">Stok</th>
                    <th class="">Harga</th>
                    <th class="" colspan="2">Operasi</th>

                </tr>
            </thead>
            <tbody>

                @forelse ($items as $item)
                <tr class="table-row">
                    <td class="w-10">{{$loop->index+1}}</td>
                    <td class="border-l-2 border-r-2 border-black">{{$item->nama}}</td>
                    <td class="border-l-2 border-r-2 border-black text-right">{{$item->stok}}</td>
                    <td class="border-l-2 border-r-2 border-black text-right">{{$item->harga}}</td>
                    <td class="border-l-2 border-r-2 border-black text-center w-16"><button
                            class="bg-black w-full text-white font-bold hover:text-black hover:bg-transparent active:bg-gray-500"
                            wire:click="edit({{$item->id}})">Edit</button>
                    </td>
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