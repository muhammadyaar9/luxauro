<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldevineOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goldevine_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefit_id');
            // $table->foreign('benefit_id')->references('id')->on('project_benefits')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            // $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('total_price');
            $table->string('quantity');
            $table->string('order_status')->default('Pending');
            $table->string('payment_status')->default('Pending');
            $table->string('payment_method')->default('Cash On Delivery');
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
        Schema::dropIfExists('goldevine_orders');
    }
}
