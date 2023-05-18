<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_branches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->string('project_category');
            $table->string('feature_image');
            $table->longText('gallery_image');
            $table->string('video_link');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('minimum_pledge_amount');
            $table->string('maximum_pledge_amount');
            $table->string('project_funding_goal');
            $table->string('recommended_pledge_amount');
            $table->string('location');
            $table->longText('description');
            $table->string('status')->default('Pending');
            $table->string('slug');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->delete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->delete('cascade');
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
        Schema::dropIfExists('project_branches');
    }
}
