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
        Schema::create('destinations', function (Blueprint $table) {
            $table->bigIncrements('destination_id')->unsigned();
            $table->text('name');
            $table->text('address');
            $table->text('cloudinary_url')->nullable();
            $table->string('local_url')->nullable();
            $table->string('alt');
            $table->string('source')->nullable(); // for attribution purposes
            $table->string('status')->default('normal'); // featured, normal, inactive
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
        Schema::dropIfExists('destinations');
    }
};
