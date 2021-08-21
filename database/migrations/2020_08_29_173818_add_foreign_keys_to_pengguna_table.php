<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->foreign('id_role', 'pengguna_ibfk_1')->references('id_role')->on('role')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_pendaftaran', 'pengguna_ibfk_2')->references('id_pendaftaran')->on('pendaftaran')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropForeign('pengguna_ibfk_1');
            $table->dropForeign('pengguna_ibfk_2');
        });
    }
}
