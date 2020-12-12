<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransactionItem extends Pivot
{
    use HasFactory;
    public $table="transaction_items";

    public $timestamps=false;
    public $incrementing = true;
    protected $guarded =[];
}
