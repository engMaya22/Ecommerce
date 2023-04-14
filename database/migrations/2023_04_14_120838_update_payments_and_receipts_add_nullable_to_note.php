<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->text('note')->nullable()->change();
        });
        Schema::table('receipts', function (Blueprint $table) {
            $table->text('note')->nullable()->change();
       });
    }
      

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amount', function (Blueprint $table) {
            //
        });
    }
};
