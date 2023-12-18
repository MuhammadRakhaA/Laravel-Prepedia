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
        Schema::create('Customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_mealplan_id')->nullabe();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('weight_goal')->nullable();
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
        Schema::dropIfExists('Users');
    }
};
