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
        Schema::create('_storage_bookings', function (Blueprint $table) {
            $table->string('storage_details');

            $table->string('storage_dimensions');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->integer('price');
            $table->integer('status')->default(0);
            $table->foreignId('storage_cat_id')->references('id')->on('storage_categories')
            ->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->string('user_name')   ;
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
        Schema::dropIfExists('_storage_bookings');
    }
};
