<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Hasil extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'hasil';

    protected $primaryKey = 'id_hasil';
    
    protected $guarded = ['id_hasil'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_family()
    {
        return $this->belongsTo(JobFamily::class, 'job_family_id');
    }
}

