<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(!Schema::hasTable('order__p_s')){
        Schema::create('order__p_s', function (Blueprint $table) {
            $table->id();
             $table->string('product_title');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('email');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('adress');
            $table->integer('order_id')->unsigned();
            $table->integer('total');
            $table->integer('phone');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order__p_s');
    }
}
