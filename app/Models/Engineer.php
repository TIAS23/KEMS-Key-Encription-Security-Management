<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mitra',
        'id_sentral',
    ];

    // Relationship dengan model Mitra
    public function mitras()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra','id');
    }

    // Relationship dengan model Sentral
    public function sentrals()
    {
        return $this->belongsTo(Sentral::class, 'id_sentral','id');
    }

}
