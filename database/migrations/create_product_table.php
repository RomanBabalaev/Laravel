<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{

    public function up()
    {
        Schema::create('product', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('price');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
        });
}


    public function down()
    {
        Schema::dropIfExists('product');
    }
}