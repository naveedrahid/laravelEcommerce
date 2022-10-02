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
            $table->unsignedBigInteger('user_id');
            $table->string('first_name',200);
            $table->string('last_name',200);
            $table->string('customer_address',200);
            $table->string('country_name',200);
            $table->string('city_name',200);
            $table->string('order_total',100);
            $table->string('email',50)->unique();
            $table->string('phone',50)->unique();
            $table->enum('order_status', ['processing','on-hold', 'complete', 'cancelled', 'refund'])->default('processing');
            $table->string('payment_type',100);
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
