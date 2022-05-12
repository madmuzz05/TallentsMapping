<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Simulasi extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'simulasi';

    protected $primaryKey = 'id_simulasi';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_simulasi',
        'user_id',
        'unit_kerja_id',
        'jabatan_id',
        'pernyataan_id',
        'tema_bakat_id',
        'nilai',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'unit_kerja_id');
    }
}
