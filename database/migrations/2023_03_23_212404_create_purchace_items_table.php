<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchace_items', function (Blueprint $table) {
            $table->id();
            $table->double('quantity');
            $table->double('price');
            $table->double('total');
            $table->foreignId('product_id');
            $table->foreignId('purchase_invoice_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchace_items');
    }
};
