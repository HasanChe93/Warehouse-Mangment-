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
        Schema::create('custom_storage_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('storage_dimensions');
            $table->unsignedBigInteger('storage_category_id');
            $table->text('storage_details');
            $table->enum('status', ['pending', 'approved', 'denied']);
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_amount')->nullable();
            $table->timestamps();

            $table->foreign('storage_category_id')
                ->references('id')->on('storage_categories')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_storage_bookings');
    }
};
