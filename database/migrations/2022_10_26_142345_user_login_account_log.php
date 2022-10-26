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
        Schema::create('user_login_account_log', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ip');
            $table->string('countryName');
            $table->string('countryCode');
            $table->string('regionCode');
            $table->string('regionName');
            $table->string('cityName');
            $table->integer('zipCode');
            $table->integer('isoCode')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('metroCode')->nullable();
            $table->string('areaCode');
            $table->string('timezone');
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
        Schema::dropIfExists('user_login_account_log');
    }
};
