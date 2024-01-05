<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GKunci extends Model
{
    protected $table = 'g_kuncis';
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'kuncis_id',
        'id_kunci',
        'id_sentral',
    ];
    
    public function kunci()
    {
        return $this->belongsTo(Kunci::class, 'id_kunci', 'id');
    }
    public function sentrals()
    {
        return $this->belongsTo(Sentral::class, 'id_sentral', 'id');
    }
public function mitras()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

}
