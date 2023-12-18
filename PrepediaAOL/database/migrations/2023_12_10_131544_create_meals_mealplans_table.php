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
           // Pivot table for many-to-many relationship
            Schema::create('mealplan_meal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mealplan_id');
            $table->unsignedBigInteger('meal_id');
            $table->timestamps();
    
            $table->foreign('mealplan_id')->references('id')->on('mealplans')->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mealplan_meal');
    }
};
