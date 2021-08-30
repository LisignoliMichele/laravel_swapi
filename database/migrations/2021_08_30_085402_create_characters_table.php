<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planet_id')->constrained();
            $table->string('name');
            $table->string('height', 50)->nullable();
            $table->string('mass', 50)->nullable();
            $table->string('hair_color', 50)->nullable();
            $table->string('skin_color', 50)->nullable();
            $table->string('eye_color', 50)->nullable();
            $table->string('birth_year', 50)->nullable();
            $table->string('gender', 50)->nullable();
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
        Schema::dropIfExists('characters');
    }
}