<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constrained("products")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("transaction_id")->constrained("transactions")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedInteger("amount");
            $table->unsignedInteger("price");
            $table->unsignedInteger("total");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_items');
    }
}
