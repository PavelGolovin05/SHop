<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->text('photo1');
            $table->text('photo2');
            $table->text('photo3');
            $table->integer('guarantee');
            $table->integer('amount');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();


            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
