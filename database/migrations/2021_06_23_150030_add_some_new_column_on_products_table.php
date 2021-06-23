<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeNewColumnOnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('lead_time')->nullable();
            $table->string('tax')->nullable();
            $table->integer('tax_type')->nullable();
            $table->integer('is_promo')->nullable();
            $table->integer('is_featured')->nullable();
            $table->integer('is_discounted')->nullable();
            $table->integer('is_trending')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            Schema::dropIfExists('products');

        });
    }
}
