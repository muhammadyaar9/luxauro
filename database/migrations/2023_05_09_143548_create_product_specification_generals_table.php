<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSpecificationGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specification_generals', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('model_series_name')->nullable();
            $table->string('model_number')->nullable();
            $table->string('primary_meterial')->nullable();
            $table->string('primary_meterial_subType')->nullable();
            $table->string('delivery_condition')->nullable();
            $table->string('suitable_for')->nullable();
            $table->string('compatible_laptop_size')->nullable();
            $table->string('foldable')->nullable();
            $table->string('adjustable_height')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('depth')->nullable();
            $table->string('weight')->nullable();
            $table->string('first_image')->nullable();
            $table->longText('first_description')->nullable();
            $table->string('second_image')->nullable();
            $table->longText('second_description')->nullable();
            $table->string('third_image')->nullable();
            $table->longText('third_description')->nullable();
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
        Schema::dropIfExists('product_specification_generals');
    }
}
