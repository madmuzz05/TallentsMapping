<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UnitKerja extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'unit_kerja';

    protected $primaryKey = 'id_unit_kerja';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_family_id',
        'departemen',
    ];

    public function job_family()
    {
        return $this->belongsTo(JobFamily::class, 'job_family_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'unit_kerja_id');
    }

    function simulasis()
    {
        return $this->hasManyThrough(Simulasi::class, User::class, 'unit_kerja_id', 'user_id', 'id_unit_kerja', 'id_user');
    }
}
