<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    
    protected $fillable = [
        'id_kunci',
        'kuncis_id',
        'id_mitras',
        'id_users',
        'mitras_id',
        'nama_perusahaan_mitra',
        'nama_petugas',
        'pekerjaan',
        'id_sentral',
        'key_combinations',
        'image',
        'approve',
        'created_at',
    ];

    // Accessor to get the full image URL
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('/storage/mitra/' . $image),
        );
    }

    // Corrected relationship methods
    public function sentrals()
    {
        return $this->belongsTo(Sentral::class, 'id_sentral', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    
    public function engineers()
    {
        return $this->hasMany(Engineer::class, 'id_mitra');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_mitra');
    }
    public function kunci()
    {
        return $this->hasOne(Kunci::class,'id', 'id_kunci');
    }

    public function gkuncis()
    {
        return $this->belongsTo(GKunci::class,'kuncis_id','id');
    }
}
