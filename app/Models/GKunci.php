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
        'generate_id',
        'sentrals_id',
    ];
    public function kunci()
    {
        return $this->hasOne(Kunci::class,'id', 'id_kunci');
    }
    public function sentrals()
    {
        return $this->belongsTo(Sentral::class, 'id');
    }
    public function sentral()
{
    return $this->belongsTo(Sentral::class, 'id_sentral');
}
public function mitras()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id'); // Mengganti 'mitra_id' dengan mitra_id yang sesuai jika berbeda
    }

}
