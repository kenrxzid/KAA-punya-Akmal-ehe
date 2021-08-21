<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Pengguna
 * 
 * @property string $id_user
 * @property string $id_role
 * @property string|null $id_pendaftaran
 * @property string $username
 * @property string $password_user
 * @property bool $status_user
 * 
 * @property Role $role
 * @property Pendaftaran $pendaftaran
 *
 * @package App\Models
 */
class Pengguna extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;

	protected $table = 'pengguna';
	protected $primaryKey = 'id_user';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'status_user' => 'bool',
		'verified' => 'bool',
	];

	protected $fillable = [
		'id_role',
		'id_pendaftaran',
		'username',
		'password',
		'status_user',
		'email'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_role');
	}

	public function pendaftaran()
	{
		return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
	}

	public function verifyUser()
	{
	  return $this->hasOne(VerifyUser::class);
	}
	public function kartu()
	{
		return $this->hasOne(Akun_Moodle::class, 'id_user');
	}
}
