<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClothesOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes_order_detail', function (Blueprint $table) {
            $table->bigIncrements('detail_id');
            $table->integer('detail_or_id');
            $table->integer('detail_cus_id');
            $table->string('detail_name', 500);
            $table->double('detail_price');
            $table->integer('detail_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothes_order_detail');
    }
}
