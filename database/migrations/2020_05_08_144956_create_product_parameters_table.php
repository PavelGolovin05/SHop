<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductParametersTable extends Migration
{
    public function up()
    {
        Schema::create('product_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('parameter_id')->unsigned()->nullable();
            $table->string('value');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('parameter_id')->references('id')->on('parameters');
        });
    }
    public function down()
    {
        Schema::dropIfExists('product_parameters');
    }
}
