<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email_address', 100);
            $table->longText('address');
            $table->string('phone_number', 15);
            $table->string('courier', 100);
            $table->string('payment', 100);
            $table->integer('total_price');
            $table->enum('status', ['success', 'pending', 'failed']);
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
        Schema::dropIfExists('shipping_details');
    }
}
