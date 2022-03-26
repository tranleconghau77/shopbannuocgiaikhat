<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->id('order_details_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->double('product_price',8,2);
            $table->integer('product_sales_quantity');
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
        Schema::drop('tbl_order_details');
    }
}
