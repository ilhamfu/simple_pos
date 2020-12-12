<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Livewire\Component;

class TransactionCreatePage extends Component
{

    public $products;
    public $search;
    public $selectedProduct;

    public $pelakuTransaksi = "";
    public $transaksiMasuk;

    public function mount()
    {
        $this->selectedProduct = [];
    }

    public function addSelected($id)
    {
        if (isset($this->selectedProduct[$id])) return;
        $product = Product::find($id);

        $this->selectedProduct[$id] = [
            "stok" => $product->stok,
            "harga" => $product->harga,
            "nama" => $product->nama,
            "jumlah" => 1

        ];
    }

    public function addItem($id)
    {
        if (($this->selectedProduct[$id]["jumlah"] < $this->selectedProduct[$id]["stok"]) || ($this->transaksiMasuk == "masuk")) {
            $this->selectedProduct[$id]["jumlah"]++;
        }
    }
    public function removeItem($id)
    {
        if ($this->selectedProduct[$id]["jumlah"] > 1) {
            $this->selectedProduct[$id]["jumlah"]--;
        } else {
            $this->removeSelected($id);
        }
    }

    public function removeSelected($id)
    {

        array_splice($this->selectedProduct, $id, 1);
    }

    public function create()
    {
        $transaction = new Transaction();
        $transaction->pelaku_transaksi = $this->pelakuTransaksi;
        $transaction->total = 0;
        $transaction->transaksiMasuk = $this->transaksiMasuk == "masuk";
        $transaction->save();

        $total = 0;

        foreach ($this->selectedProduct as $key => $value) {

            if ($this->transaksiMasuk == "masuk") {
                Product::where("id", $key)->increment("stok", $value["jumlah"]);
            } else {
                Product::where("id", $key)->decrement("stok", max($value["jumlah"], $value["stok"]));
            }

            $temp = new TransactionItem();
            $temp->transaction_id = $transaction->id;
            $temp->product_id = $key;
            $temp->transaction_id = $transaction->id;
            $temp->amount = $value["jumlah"];
            $temp->price = $value["harga"];
            $temp->total = $value["harga"] * $value["jumlah"];
            $temp->save();
            $total += $value["harga"] * $value["jumlah"];
        }
        $transaction->total = $total;
        $transaction->save();
        return redirect()->route("transaction");
    }

    public function render()
    {
        $this->products = Product::where("nama", "like", "%$this->search%")->get();
        return view('livewire.transaction-create-page');
    }
}
