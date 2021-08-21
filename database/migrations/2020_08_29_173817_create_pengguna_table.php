<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->char('id_user', 8)->primary();
            $table->char('id_role', 2)->index('id_role');
            $table->char('id_pendaftaran', 5)->nullable()->index('id_pendaftaran');
            $table->string('username', 15);
            $table->string('password');
            $table->string('email', 100);
            $table->tinyInteger('status_user');
            $table->boolean('verified')->default(false);
        });

        DB::unprepared("CREATE TRIGGER `auto_id_pengguna` BEFORE INSERT ON `pengguna` FOR EACH ROW 
            BEGIN
                SELECT SUBSTRING((MAX(`id_user`)),2,7) INTO @total FROM pengguna;
                IF (@total >= 1) THEN
                    SET new.id_user = CONCAT('S',LPAD(@total+1,7,'0'));
                ELSE
                    SET new.id_user = CONCAT('S',LPAD(1,7,'0'));
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
        Schema::dropIfExists('pengguna');
    }
}
