<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_bookings', function (Blueprint $table) {
            $table->integer('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('now');
            $table->integer('nrOfDays');
            $table->double('price');
            $table->integer('room_id');
            $table->timestamps();
            $table->string('name');
            $table->string('telno');
            $table->string('email');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_bookings');
    }
}
