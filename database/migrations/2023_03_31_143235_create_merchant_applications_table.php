<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_applications', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('business_address');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('zip_code');
            $table->string('business_email');
            $table->string('business_website');
            $table->string('phone_number');
            $table->string('ein');
            $table->string('bank_account_number');
            $table->string('credit_card_number');
            $table->string('description_about_us');
            $table->string('business_run');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id')->references('id')->on('delivery_options')->onDelete('cascade');
            $table->longText('social_media_link')->nullable();
            $table->longText('owner_name')->nullable();
            $table->string('owner_introduce')->nullable();
            $table->longText('team_memeber_name');
            $table->string('history')->nullable();
            $table->string('ethic')->nullable();
            $table->string('philosophy')->nullable();
            $table->string('business_logo');
            $table->string('store_header');
            $table->longText('owner_image')->nullable();
            $table->longText('team_memeber_image');
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ssn_tin');
            $table->string('open_store');
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
        Schema::dropIfExists('merchant_applications');
    }
}
