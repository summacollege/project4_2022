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
        Schema::create('pizza_orders', function (Blueprint $table) {
            
            $table->id();
            $table-> string('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('adress');
            $table->string('postal_code');
            $table->string('city');
            $table->string('pizza');
            $table->string('status')->default('pending');
            $table->dateTime('delivery_date')->nullable();
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
        //
    }
};
