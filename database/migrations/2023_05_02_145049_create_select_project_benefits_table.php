<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectProjectBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_project_benefits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefit_id');
            $table->foreign('benefit_id')->references('id')->on('project_benefits')->onDelete('cascade');
            $table->string('user_id')->nullable();
            $table->string('temp_id')->nullable();
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
        Schema::dropIfExists('select_project_benefits');
    }
}
