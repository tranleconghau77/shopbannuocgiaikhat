<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_quantity');
            $table->integer('product_sold');
            $table->string('product_slug');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_desc');
            $table->string('product_content');
            $table->string('product_price');
            $table->string('product_image');
            $table->integer('product_status');
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
        Schema::drop('tbl_product');
    }
}
