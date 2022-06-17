<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JobFamily extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'job_family';
    protected $primaryKey = 'id_job_family';

    protected $guarded = ['id_job_family'];

    public function unit_kerja(){
        return $this->hasMany(UnitKerja::class, 'job_family_id');
    }

}
