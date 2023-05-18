<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharterAvaliabiltyDateAndTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_avaliabilty_date_and_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charter_id');
            $table->foreign('charter_id')->references('id')->on('charters')->delete('cascade');
            $table->date('date_of_avalability');
            $table->time('time_of_avalability');
            $table->time('end_time')->nullable();
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
        Schema::dropIfExists('charter_avaliabilty_date_and_times');
    }
}
