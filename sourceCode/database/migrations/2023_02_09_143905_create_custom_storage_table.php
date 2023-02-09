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
    Schema::create('custom_storage', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->references('id')->on('users')
    ->onDelete('cascade');
    $table->decimal('storage_price');
    $table->string('storage_name');
    $table->foreignId('storage_cat_id')->references('id')->on('storage_categories')
    ->onDelete('cascade');
    $table->text('storage_description');
    $table->binary('storage_dimensions');
    $table->date('start_date');
    $table->date('end_date');
    $table->string('status')->default('pending');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_storage');
    }
};
