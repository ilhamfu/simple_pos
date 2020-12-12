<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{

    public $search;
    public $items;

    public $nama;
    public $harga;
    public $stok;
    public $selectedId;

    public $updateMode;

    public function mount()
    {
        $this->search = "";
        $this->updateMode = false;
        $this->items = Product::where("nama", "like", "%$this->search%")->get();
    }

    private function clearInput()
    {
        $this->nama = "";
        $this->stok = "";
        $this->harga = "";
    }
    public function cancelUpdate()
    {
        $this->clearInput();
        $this->updateMode = false;
        $this->selectedId = -1;
    }

    public function create()
    {
        if ($this->updateMode) {
            $new_product = Product::find($this->selectedId);
            $new_product->nama = $this->nama;
            $new_product->stok = $this->stok;
            $new_product->harga = $this->harga;
            $this->updateMode = false;
            $this->selectedId = -1;
        } else {
            $new_product = new Product();
            $new_product->nama = $this->nama;
            $new_product->stok = $this->stok;
            $new_product->harga = $this->harga;
        }
        $new_product->save();


        $this->clearInput();
    }

    public function delete($id)
    {
        if ($this->selectedId != $id) {
            Product::destroy($id);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->nama = $product->nama;
        $this->stok = $product->stok;
        $this->harga = $product->harga;
        $this->selectedId = $product->id;
        $this->updateMode = true;
    }

    public function render()
    {
        $this->items = Product::where("nama", "like", "%$this->search%")->get();
        return view('livewire.product-page');
    }
}
