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
            $table->integer('cashAmount')->nullable()->after('percentOff');
            $table->integer('cashBonus')->nullable()->after('cashAmount');
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
            $table->dropColumn('cashAmount');
            $table->dropColumn('cashBonus');
        });
    }
};
