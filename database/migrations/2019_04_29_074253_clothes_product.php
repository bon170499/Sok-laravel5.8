<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClothesProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes_product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name', 500);
            $table->string('product_img', 500);
            $table->double('product_price');
            $table->string('product_desc', 500);
            $table->integer('product_hot');
            $table->integer('product_sale');
            $table->double('product_upto');
            $table->integer('product_fk_id');
            $table->integer('product_ab_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothes_product');
    }
}
