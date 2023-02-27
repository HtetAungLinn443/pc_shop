<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_image');
            $table->string('price');
            $table->string('main_category');
            $table->string('second_category');
            $table->string('brand_name');
            $table->string('brand_image');
            $table->string('path_number');
            $table->string('barcode');
            $table->string('commercial_warranty');
            $table->string('legal_warranty')->nullable();
            $table->integer('stock_count');
            $table->string('mainId');
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
        Schema::dropIfExists('products');
    }
};
