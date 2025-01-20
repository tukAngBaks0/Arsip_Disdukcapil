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
    Schema::table('dokumens', function (Blueprint $table) {
        $table->string('kia')->nullable()->change();  // Ubah kolom kia menjadi nullable
    });
}

public function down()
{
    Schema::table('dokumens', function (Blueprint $table) {
        $table->string('kia')->nullable(false)->change();  // Kembalikan jika diperlukan
    });
}

};
