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
        Schema::create('Meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('calorie');
            $table->integer('carb');
            $table->integer('fat');
            $table->integer('protein');
            $table->string('nutrition_value');
            $table->string('ingredients');
            $table->string('recipe');
            $table->string('image')->nullable();;
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
        Schema::dropIfExists('Meals');
    }
};
