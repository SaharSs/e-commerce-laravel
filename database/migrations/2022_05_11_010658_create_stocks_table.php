<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('stocks')){
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
             $table->integer('product_id')->unsigned();
             $table->integer('quantity');
               $table->timestamps(); 
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
