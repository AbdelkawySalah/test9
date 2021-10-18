<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->string('floor_no');
            $table->boolean('status')->default(1);
            $table->string('duration')->default(0);
            $table->foreignId('nurseId')->references('id')->nullable()->on('h_nurses')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_rooms');
    }
}
