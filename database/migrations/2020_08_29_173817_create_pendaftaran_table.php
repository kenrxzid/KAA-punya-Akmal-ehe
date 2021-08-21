<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->char('id_pendaftaran', 5)->primary();
            $table->string('nama_pendaftar', 30);
            $table->string('asal_daerah', 30)->nullable();
            $table->string('asal_univ_pendaftar', 40);
            $table->string('email_pendaftar', 50);
            $table->char('no_telepon_pendaftar', 12)->nullable();
            $table->string('id_line_pendaftar', 25)->nullable();
            $table->text('scan_ktm')->nullable();
            $table->text('pas_foto')->nullable();
            $table->text('scan_suket_aktif')->nullable();
            $table->timestamp('tgl_pendaftaran')->useCurrent();
            $table->tinyInteger('status_pendaftaran');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_pendaftaran` BEFORE INSERT ON `pendaftaran` FOR EACH ROW 
            BEGIN
                SELECT SUBSTRING((MAX(`id_pendaftaran`)),2,4) INTO @total FROM pendaftaran;
                IF (@total >= 1) THEN
                    SET new.id_pendaftaran = CONCAT('P',LPAD(@total+1,4,'0'));
                ELSE
                    SET new.id_pendaftaran = CONCAT('P',LPAD(1,4,'0'));
                END IF;
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `auto_id_pendaftaran`');
        Schema::dropIfExists('pendaftaran');
    }
}
