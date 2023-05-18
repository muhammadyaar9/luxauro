<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('business_address');
            $table->string('business_name');
            $table->integer('city');
            $table->integer('state');
            $table->string('zip_code');
            $table->integer('country');
            $table->string('business_email');
            $table->string('business_website');
            $table->string('business_phone');
            $table->string('ein');
            $table->string('bank_account_number');
            $table->string('credit_card_number');
            $table->string('store_header_logo');
            $table->string('upload_business_logo');
            $table->string('business_detail');
            $table->integer('business_type_id');
            $table->string('delivery_id');
            $table->string('social_media_link');
            $table->string('owner_name');
            $table->string('owner_upload_image');
            $table->string('introduce_owner');
            $table->string('team_owner_name');
            $table->string('team_upload_image');
            $table->string('history');
            $table->string('ethic');
            $table->string('philosophy');
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
        Schema::dropIfExists('merchant_details');
    }
}
