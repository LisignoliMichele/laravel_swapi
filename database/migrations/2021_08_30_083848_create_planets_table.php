<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('rotation_period', 50)->nullable();
            $table->string('orbital_period', 50)->nullable();
            $table->string('diameter', 50)->nullable();
            $table->string('climate', 50)->nullable();
            $table->string('gravity', 50)->nullable();
            $table->string('terrain', 50)->nullable();
            $table->string('surface_water', 50)->nullable();
            $table->string('population', 50)->nullable();
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
        Schema::dropIfExists('planets');
    }
}
