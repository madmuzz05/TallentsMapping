<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BobotNilai extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'bobot_nilai';
    protected $primaryKey = 'id_bobot_nilai';

    protected $guarded = ['id_bobot_nilai'];

    public function parameter()
    {
        return $this->belongsTo(Parameter_Penilaian::class, 'parameter_penilaian_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function simulasi()
    {
        return $this->belongsTo(Simulasi::class, 'simulasi_id');
    }

}
