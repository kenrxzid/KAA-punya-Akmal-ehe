<?php

namespace App\Exports;

use App\Models\Pengguna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MoodleExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Pengguna::select('username','p.nama_pendaftar','email','password_moodle')->join('pendaftaran as p','p.id_pendaftaran','=','pengguna.id_pendaftaran')->join('akun_moodle as a','a.id_user','=','pengguna.id_user')->where('pengguna.id_role','=',2)->where('status_pendaftaran','=',1)->get();
        foreach($user as $s){
            $s->lastname = 'Peserta';
        }
        return $user;
    }

    public function headings(): array
    {
        return [
            'username',
            'firstname',
            'email',
            'password',
            'lastname',
        ];
    }
}
