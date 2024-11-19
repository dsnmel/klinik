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
        Schema::table('pasien', function (Blueprint $table) {
            $table->dropUnique('unique_no_reg_nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pasien', function (Blueprint $table) {
            $table->unique(['no_reg', 'nama']);
        });
    }
};
