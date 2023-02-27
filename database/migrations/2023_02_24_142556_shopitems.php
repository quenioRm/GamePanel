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
        Schema::create('shopitems', function (Blueprint $table) {
            $table->id();
            $table->integer('categoryId');
            $table->integer('itemId');
            $table->string('name', 50);
            $table->string('description', 50)->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('available');
            $table->decimal('percentOff', 10, 2);
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
        Schema::dropIfExists('shopitems');
    }
};
