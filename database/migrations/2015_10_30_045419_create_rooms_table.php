<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45)->unique();
            $table->integer('max_customer', false);
            $table->text('description')->nullable();
            $table->string('slug', 45)->unique();
            $table->boolean('is_available');
            $table->timestamps();

            $table->integer('floor_id')->unsigned()->nullable();
            $table->foreign('floor_id')->references('id')->on('floors');

            $table->integer('room_type_id')->unsigned();
            $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms');
    }
}
