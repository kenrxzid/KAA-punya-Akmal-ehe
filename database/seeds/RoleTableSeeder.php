<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role')->delete();
        
        \DB::table('role')->insert(array (
            0 => 
            array (
                'id_role' => '1',
                'nama_role' => 'Admin',
            ),
            1 => 
            array (
                'id_role' => '2',
                'nama_role' => 'Peserta',
            ),
        ));
        
        
    }
}