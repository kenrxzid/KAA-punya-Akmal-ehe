<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
	protected $table = 'verify_users';
    protected $primarykey = 'id_user';
    public $incrementing = false;

    protected $fillable = [
		'id_user',
		'token'
	];
 
    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'id_user');
    }
}
