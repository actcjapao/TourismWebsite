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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id')->unsigned();
            $table->string('fullname');
            $table->string('email');
            $table->string('contact');
            $table->text('destinations');
            $table->integer('number_of_guests');
            $table->string('tour_date');
            $table->string('pickup_time');
            $table->text('pickup_location');
            $table->text('notes')->nullable();
            $table->string('status')->default('unverified'); // unverified, verified
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
        Schema::dropIfExists('bookings');
    }
};
