<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionPage extends Component
{
    public $items;
    public function render()
    {
        $this->items = Transaction::all();
        return view('livewire.transaction-page');
    }
    public function delete($id)
    {
        Transaction::where("id",$id)->delete();
    }
}


