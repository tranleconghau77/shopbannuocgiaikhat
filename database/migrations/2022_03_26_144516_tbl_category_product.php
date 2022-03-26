<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_category_product', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('meta_keywords');
            $table->string('category_name');
            $table->string('slug_category_product');
            $table->string('category_desc');
            $table->integer('category_status');
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
        Schema::drop('tbl_category_product');
    }
}
