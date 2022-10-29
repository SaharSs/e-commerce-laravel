<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->integer('product_id')->unsigned();
            $table->integer('s_id')->unsigned();
            $table->string('product_n');
            $table->integer('user_id');
             $table->integer('quantity');
            $table->integer('amount');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('s_id')->references('id')->on('stocks')->onDelete('cascade');
           
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
        Schema::dropIfExists('carts');
    }
}
