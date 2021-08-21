<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->char('id_pembayaran', 5)->primary();
            $table->char('id_pendaftaran', 5)->index('id_pendaftaran');
            $table->string('atas_nama_rekening', 30);
            $table->string('bank_asal', 25);
            $table->string('nomor_rekening', 20);
            $table->timestamp('tanggal_pembayaran')->useCurrent();
            $table->integer('total_pembayaran');
            $table->integer('status_pembayaran');
            $table->text('bukti_pembayaran');
        });
        DB::unprepared("CREATE TRIGGER `auto_id_pembayaran` BEFORE INSERT ON `pembayaran` FOR EACH ROW 
            BEGIN
             SELECT SUBSTRING((MAX(`id_pembayaran`)),2,4) INTO @total FROM pembayaran;
                IF (@total >= 1) THEN
                    SET new.id_pembayaran = CONCAT('B',LPAD(@total+1,4,'0'));
                ELSE
                    SET new.id_pembayaran = CONCAT('B',LPAD(1,4,'0'));
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
        DB::unprepared('DROP TRIGGER `auto_id_pembayaran`');
        Schema::dropIfExists('pembayaran');
    }
}
