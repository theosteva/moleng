<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->string('lane')->nullable()->after('second_role');
            $table->string('second_lane')->nullable()->after('lane');
        });
    }

    public function down()
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn(['lane', 'second_lane']);
        });
    }
};