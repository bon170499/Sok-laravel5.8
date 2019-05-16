<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClothesCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes_customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name', 500);
            $table->string('customer_address', 500);
            $table->string('customer_email', 500);
            $table->integer('customer_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothes_customer');
    }
}
