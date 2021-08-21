<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembayaran
 * 
 * @property string $id_pembayaran
 * @property string $id_pendaftaran
 * @property string $atas_nama_rekening
 * @property string $bank_asal
 * @property string $nomor_rekening
 * @property Carbon $tanggal_pembayaran
 * @property int $total_pembayaran
 * @property int $status_pembayaran
 * @property string $bukti_pembayaran
 * 
 * @property Pendaftaran $pendaftaran
 *
 * @package App\Models
 */
class Pembayaran extends Model
{
	protected $table = 'pembayaran';
	protected $primaryKey = 'id_pembayaran';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'total_pembayaran' => 'int',
		'status_pembayaran' => 'int'
	];

	protected $dates = [
		'tanggal_pembayaran'
	];

	protected $fillable = [
		'id_pendaftaran',
		'atas_nama_rekening',
		'bank_asal',
		'nomor_rekening',
		'tanggal_pembayaran',
		'total_pembayaran',
		'status_pembayaran',
		'bukti_pembayaran'
	];

	public function pendaftaran()
	{
		return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
	}
}
