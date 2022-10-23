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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('isIpCheck')->nullable()->after('google_id');
            $table->string('ip')->nullable()->after('isIpCheck');
            $table->string('uuid')->nullable()->after('ip');
            $table->dateTime('birth')->nullable()->after('uuid');
            $table->string('nationCode')->nullable()->after('birth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isIpCheck');
            $table->dropColumn('ip');
            $table->dropColumn('uuid');
            $table->dropColumn('birth');
            $table->dropColumn('nationCode');
        });
    }
};
