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
        Schema::create('Mealsets', function (Blueprint $table) {
            $table->id();
            $table->integer('mealset_id');
            $table->integer('meal_1_id');
            $table->integer('meal_2_id');
            $table->integer('meal_3_id');
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
        Schema::dropIfExists('Mealsets');
    }
};
