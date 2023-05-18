<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('benefit_name');
            $table->string('price');
            $table->string('benefit_msrp');
            $table->string('feature_image');
            $table->string('estimated_delivery_date');
            $table->string('quantity');
            $table->longText('short_description');
            $table->unsignedBigInteger('project_id');
            // $table->foreign('project_id')->references('id')->on('projects')->delete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->delete('cascade');

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
        Schema::dropIfExists('project_benefits');
    }
}
