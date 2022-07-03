<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pernyataan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pernyataan';

    protected $primaryKey = 'id_pernyataan';
    protected $guarded = ['id_pernyataan'];
    public function tema_bakat()
    {
        return $this->belongsTo(TemaBakat::class, 'tema_bakat_id');
    }
}
