<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->string('project_category');
            $table->string('feature_image');
            $table->longText('gallery_image');
            $table->string('video_link');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('minimum_pledge_amount');
            $table->string('maximum_pledge_amount');
            $table->string('project_funding_goal');
            $table->string('recommended_pledge_amount');
            $table->string('location');
            $table->longText('description');
            $table->string('status')->default('Pending');
            $table->string('slug');
            $table->unsignedBigInteger('user_id');
            $table->string('add_to_favirate')->nullable();
            $table->string('project_end_method');
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
        Schema::dropIfExists('projects');
    }
}
