<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharterBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_bookings', function (Blueprint $table) {
            $table->id();
            $table->string("book_from");
            $table->string("book_to");
            $table->string("time_from");
            $table->string("time_to");
            $table->string("number_of_guest");
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
        Schema::dropIfExists('charter_bookings');
    }
}
