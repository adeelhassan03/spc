<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('areYou');
            $table->string('shop_phone_area_code');
            $table->string('shop_phone_number');
            $table->string('email');
            $table->string('company_name');
            $table->string('address');
            $table->string('street');
            $table->string('state_province_region');
            $table->string('postal_zip_code');
            $table->string('country');
            $table->string('buy_parts_from');
            $table->string('alignment_work_type');
            $table->string('status');
            $table->string('admin_id');
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
        Schema::dropIfExists('orders');
    }
}
