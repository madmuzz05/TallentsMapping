<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Parameter_Penilaian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'parameter_penilaian';

    protected $primaryKey = 'id_parameter_penilaian';

    protected $guarded = ['id_parameter_penilaian'];

    public function tema_bakat()
    {
        return $this->belongsTo(TemaBakat::class, 'tema_bakat_id');
    }
    public function job_family()
    {
        return $this->belongsTo(JobFamily::class, 'job_family_id');
    }
}
