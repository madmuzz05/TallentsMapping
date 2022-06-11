<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TemaBakat extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tema_bakat';

    protected $primaryKey = 'id_tema_bakat';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_tema',
        'deskripsi'
    ];

    public function pernyataan()
    {
        return $this->hasMany(Pernyataan::class, 'tema_bakat_id');
    }
    function simulasis()
    {
        return $this->hasManyThrough(Simulasi::class, Pernyataan::class, 'tema_bakat_id', 'pernyataan_id', 'id_tema_bakat', 'id_pernyataan');
    }
}
