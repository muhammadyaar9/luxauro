<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_logo')->nullable();
            $table->string('upload_your_store_header')->nullable();
            $table->string('address');
            $table->unsignedBigInteger('country_id');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('state_id');
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('city');
            $table->string('email');
            $table->string('business_website');
            $table->string('business_phone');
            $table->string('ein');
            $table->string('bank_account_number');
            $table->string('credit_card_number');
            $table->string('description');
            $table->string('kind_of_business'); 
            $table->unsignedBigInteger('delivery_id');
            // $table->foreign('delivery_id')->references('id')->on('delivory_options')->onDelete('cascade');
            $table->string('social_media_link')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_image')->nullable();
            $table->string('history')->nullable();
            $table->string('ethic')->nullable();
            $table->string('philosophy')->nullable();
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('vendor_accounts');
    }
}
