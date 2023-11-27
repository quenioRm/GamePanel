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
        Schema::table('shopitems', function (Blueprint $table) {
            $table->integer('categoryId')->nullable()->after('subcategoryId');
            $table->string('image')->nullable()->after('percentOff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopitems', function (Blueprint $table) {
            $table->dropColumn('categoryId');
            $table->dropColumn('image');
        });
    }
};
