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
        Schema::create('giftCode', function (Blueprint $table) {
            $table->id();
            $table->string('giftCodeId');
            $table->string('description', 150);
            $table->datetime('expires_at');
            $table->timestamps();
        });

        Schema::create('giftCodeItem', function (Blueprint $table) {
            $table->id();
            $table->string('giftCodeId');
            $table->integer('itemId');
            $table->integer('enchantLevel');
            $table->integer('itemCount');
            $table->timestamps();
        });

        Schema::create('giftCodeHistory', function (Blueprint $table) {
            $table->id();
            $table->string('giftCodeId');
            $table->integer('userNo');
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
        Schema::dropIfExists('giftCode');
        Schema::dropIfExists('giftCodeItem');
        Schema::dropIfExists('giftCodeHistory');
    }
};
