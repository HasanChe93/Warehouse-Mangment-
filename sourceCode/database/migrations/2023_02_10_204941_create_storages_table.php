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
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->binary('storage_dimensions');

            $table->foreignId('storage_cat_id')->references('id')->on('storage_categories')
                ->onDelete('cascade');
            $table->string('storage_name');
            $table->decimal('s_meter_price');
            $table->text('storage_description');
            $table->string('storage_image')->nullable();
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
        Schema::dropIfExists('storages');
    }
};
