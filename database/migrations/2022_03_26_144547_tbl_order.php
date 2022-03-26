<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreign('customer_id')->references('customer_id')->on('tbl_customers');
            $table->foreign('shipping_id')->references('shipping_id')->on('tbl_shipping');
            $table->foreign('payment_id')->references('payment_id')->on('tbl_payment');
            $table->double('order_total',8,2);
            $table->string('order_status');
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
        //
        Schema::drop('tbl_order');
    }
}
