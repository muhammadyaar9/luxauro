<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_price');
            $table->longText('product_description');
            $table->string('image');
            $table->string('product_type_id');
            // $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->string('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('delivory_option_id');
            // $table->foreign('delivory_option_id')->references('id')->on('delivory_options')->onDelete('cascade');
            $table->string('shipping_type_id');
            // $table->foreign('shipping_type_id')->references('id')->on('shipping_types')->onDelete('cascade');
            $table->string('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('shipping_charge');
            $table->string('status');
            $table->string('multiple_image');
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
        Schema::dropIfExists('products');
    }
}
