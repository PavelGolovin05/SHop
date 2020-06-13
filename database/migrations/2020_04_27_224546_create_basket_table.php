<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketTable extends Migration
{
    public function up()
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_amount');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->date('add_date');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
    public function down()
    {
        Schema::dropIfExists('basket');
    }
}
