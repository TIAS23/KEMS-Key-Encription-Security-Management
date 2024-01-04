<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id_user', 'id_sentral', 'id_mitra'
    ];

    // Definisikan relasi dengan tabel Users, Sentrals, dan Mitras
    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function sentrals()
    {
        return $this->belongsTo(Sentral::class, 'id_sentral');
    }

    public function mitras()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }
}
