<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharterDeliveryOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_delivery_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charter_id');
            $table->unsignedBigInteger('delivery_option_id');
            $table->foreign('charter_id')->references('id')->on('charters')->onDelete('cascade');
            $table->foreign('delivery_option_id')->references('id')->on('delivery_options')->onDelete('cascade');
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
        Schema::dropIfExists('charter_delivery_options');
    }
}
