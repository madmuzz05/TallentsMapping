<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Jabatan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'jabatan';

    protected $primaryKey = 'id_jabatan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kategori_jabatan',
    ];

    function user()
    {
        return $this->hasMany(User::class, 'jabatan_id');
    }

    function simulasis()
    {
        return $this->hasManyThrough(Simulasi::class, User::class, 'jabatan_id', 'user_id', 'id_jabatan', 'id_user');
    }
}
