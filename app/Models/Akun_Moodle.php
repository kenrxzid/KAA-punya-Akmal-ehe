<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property string $id_user
 * @property string password_moodle
 * 
 * @property Collection|Pengguna[] $penggunas
 *
 * @package App\Models
 */
class Akun_Moodle extends Model
{
	protected $table = 'akun_moodle';
	protected $primaryKey = 'id_user';
	public $incrementing = false;
	public $timestamps = false;


	public function pengguna()
	{
		return $this->belongsTo(Pengguna::class, 'id_user');
	}
}