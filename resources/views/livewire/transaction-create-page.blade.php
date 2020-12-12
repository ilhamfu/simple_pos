<div class="w-full mt-3">

    <div class="flex flex-row justify-between w-full">
        <div class="flex flex-row">
            <input class="bg-gray-100 h-8 border-black border p-2" type="text" placeholder="Pelaku Transaksi"
            wire:model.defer="pelakuTransaksi">
            <label ><input type="checkbox" wire:model.defer="transaksiMasuk" value="masuk">Transaksi Masuk?</label>
        </div>
        
        <button
            class="w-36 align-middle h-8 flex items-center justify-center border  border-black hover:bg-transparent bg-black text-white font-bold hover:text-black active:bg-gray-300"
            wire:click="create">Simpan</button>

    </div>
    <div class="bg-black my-1" style="height:1px"></div>
    <div class="flex flex-row space-x-1 w-full">
        <div class="w-full">
            <div class="flex flex-row">
                <div
                    class="w-24 align-middle h-8 flex items-center justify-center border border-r-0 border-black rounded-l-md font-bold">
                    <label for="product-search">Cari</label>
                </div>

                <input class="w-full bg-gray-100 h-8 border-black border rounded-r-md p-2" type="text"
                    name="product-name" wire:model="search" id="product-search"
                    placeholder="Cari berdasarkan nama produk">
            </div>

            <div class="bg-black my-1" style="height:1px"></div>

            <div class="flex flex-row">
                <div class="table-container w-full">

                    <table class="w-full">
                        <thead>
                            <tr class="bg-black text-white">
                                <th class="w-10">#</th>
                                <th class="">Nama</th>
                                <th class="">Stok</th>
                                <th class="">Harga</th>
                                <th class="" colspan="1">Operasi</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($products as $item)
                            <tr class="table-row">
                                <td class="w-10">{{$loop->index+1}}</td>
                                <td class="border-l-2 border-r-2 border-black">{{$item->nama}}</td>
                                <td class="border-l-2 border-r-2 border-black text-right">{{$item->stok}}</td>
                                <td class="border-l-2 border-r-2 border-black text-right">{{$item->harga}}</td>
                                <td class="border-l-2 border-r-2 border-black text-center w-16"><button
                                        class="bg-black w-full text-white font-bold hover:text-black hover:bg-transparent active:bg-gray-500"
                                        wire:click="addSelected({{$item->id}})">Tambah</button>
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
        </div>
        <div class="w-full">

            <div class="flex flex-row">
                <div class="table-container w-full">

                    <table class="w-full">
                        <thead>
                            <tr class="bg-black text-white">
                                <th class="w-10">#</th>
                                <th class="">Nama</th>
                                <th class="">Jumlah</th>
                                <th class="">Total</th>
                                <th class=" " colspan="3">Operasi</th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($selectedProduct as $key => $item)

                            <tr class="table-row">
                                <td class="w-10">{{$loop->index+1}}</td>
                                <td class="border-l-2 border-r-2 border-black">{{$item["nama"]}}</td>
                                <td class="border-l-2 border-r-2 border-black">{{$item["jumlah"]}}</td>
                                <td class="border-l-2 border-r-2 border-black">{{$item["jumlah"]*$item["harga"]}}</td>

                                <td class="border-l-2 border-r-2 border-black text-center w-16 ">

                                    <button
                                        class="bg-black w-full text-white font-bold hover:text-black hover:bg-transparent active:bg-gray-500"
                                        wire:click="addItem({{$key}})">+</button>
                                </td>
                                <td>
                                    <button
                                        class="bg-black w-full text-white font-bold hover:text-black hover:bg-transparent active:bg-gray-500"
                                        wire:click="removeItem({{$key}})">-</button>
                                </td>
                                <td class="border-l-2 border-r-2 border-black text-center w-16"><button
                                        class="bg-black w-full text-white font-bold hover:text-black hover:bg-transparent active:bg-gray-500"
                                        wire:click="removeSelected({{$key}})">Hapus</button>
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
        </div>
    </div>



</div>