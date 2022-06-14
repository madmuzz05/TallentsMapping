<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterPenilaian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'parameter_penilaian';

    protected $primaryKey = 'id_parameter_penilaian';
    
    protected $guarded = ['id_parameter_penilaian'];

    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function tema_bakat()
    {
        return $this->belongsTo(TemaBakat::class, 'tema_bakat_id');
    }
}
