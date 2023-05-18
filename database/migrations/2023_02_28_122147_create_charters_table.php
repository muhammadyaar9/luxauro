<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charters', function (Blueprint $table) {
            $table->id();
            $table->string('charter_name');
            $table->string('charter_type');
            $table->string('rate');
            $table->string('hr_select')->nullable();
            $table->string('description');
            $table->string('max_guests');
            $table->string('terms_condition');
            $table->string('thumbnail_img');
            $table->string('charter_agreement');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('charters');
    }
}
