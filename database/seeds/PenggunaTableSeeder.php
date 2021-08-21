<?php

use Illuminate\Database\Seeder;

class PenggunaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('pengguna')->delete();
        
        \DB::table('pengguna')->insert(array (
            0 => 
            array (
                'id_role' => '1',
                'username' => 'admin1',
                'password' => bcrypt("akunadmin1"),
                'status_user' => 1,
                'email' => ''
            ),
            1 => 
            array (
                'id_role' => '1',
                'username' => 'admin2',
                'password' => bcrypt("akunadmin2"),
                'status_user' => 1,
                'email' => ''
            ),
            2 => 
            array (
                'id_role' => '1',
                'username' => 'hikmatus',
                'password' => bcrypt("hikmatus"),
                'status_user' => 1,
                'email' => ''
            ),
            3 => 
            array (
                'id_role' => '1',
                'username' => 'ajengayu',
                'password' => bcrypt("ajengayu"),
                'status_user' => 1,
                'email' => ''
            ),
        ));
    }
}