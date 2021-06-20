<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_atts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sku');
            $table->string('image_attribute')->nullable();
            $table->integer('mrp')->nullable();;
            $table->integer('price')->nullable();;
            $table->integer('quantity')->nullable();
            $table->bigInteger('size_id')->unsigned(); // foreign key must same datatype
            $table->bigInteger('color_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_atts');
    }
}
