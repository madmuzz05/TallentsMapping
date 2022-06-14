<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'hasil';

    protected $primaryKey = 'id_hasil';
    
    protected $guarded = ['id_hasil'];

    public function parameter_penilaian()
    {
        return $this->belongsTo(ParamaterPenilaian::class, 'penilaian_id');
    }
    public function simulasi()
    {
        return $this->belongsTo(Simulasi::class, 'simulasi_id');
    }
}

