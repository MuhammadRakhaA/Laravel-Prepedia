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

        Schema::create('customer_mealplan', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('customer_id');

            $table->unsignedBigInteger('mealplan_id');

            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->foreign('mealplan_id')->references('id')->on('mealplans')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_mealplan');
    }
};
