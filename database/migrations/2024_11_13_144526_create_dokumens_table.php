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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penduduk_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();
            $table->string('kk');
            $table->string('ktp');
            $table->string('kia');
            $table->string('surat_pindah');
            $table->string('surat_kehilangan');
            $table->string('akta_kelahiran');
            $table->string('akta_kematian');
            $table->string('akta_perkawinan');
            $table->string('akta_perceraian');
            $table->timestamps();
        });
Schema::table('dokumens', function (Blueprint $table) {
$table->foreign('penduduk_id')->references('id')->on('penduduks')->onUpdate('cascade')->onDelete('cascade');
});
Schema::table('dokumens', function (Blueprint $table) {
$table->foreign('admin_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropForeign('dokumens_penduduk_id_foreign');
            $table->dropIndex('dokumens_penduduk_id_foreign');
            $table->dropForeign('dokumens_admin_id_foreign');
            $table->dropIndex('dokumens_admin_id_foreign');
            });

        Schema::dropIfExists('dokumens');
    }
};