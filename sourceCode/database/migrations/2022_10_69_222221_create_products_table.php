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
            $table->string('product_name');
            $table->string('brand_name');
            $table->string('shipper_name');
            $table->bigInteger('product_model');
            $table->bigInteger('product_quantity');
            $table->foreignId('cat_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->decimal('product_price');
            $table->text('product_description');
            $table->string('product_image1')->nullable();
            $table->string('product_image2')->nullable();
            $table->string('product_image3')->nullable();
            $table->string('product_image4')->nullable();

            $table->string('status')->default('1');
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
