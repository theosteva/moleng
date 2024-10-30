<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('heroes', function (Blueprint $table) {
            // Drop kolom yang ada dulu jika perlu
            $table->dropColumn(['name', 'image', 'role']);
            
            // Tambahkan kolom baru
            $table->string('name')->after('id');
            $table->string('image')->nullable()->after('name');
            $table->string('role')->after('image');
            $table->string('second_role')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn('second_role');
            // Kembalikan ke struktur awal jika perlu
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('role');
        });
    }
};