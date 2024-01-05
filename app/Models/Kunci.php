<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kunci extends Model
{
    use HasFactory;

    protected $fillable = [
        'generateCode',
        'id_mitra',
        'id_sentral',
        'image',
    ];

    protected $appends = ['image_url'];

    protected $primaryKey = 'id';


    public function sentral()
    {
        return $this->belongsTo(Sentral::class, 'id_sentral');
    }



    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->unique_code = self::generateUniqueCode();
        });
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/kuncis/' . $this->image) : null;
    }

    protected static function generateUniqueCode($length = 4)
    {
        $characters = '0123456789';
        $code = '';
    
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        while (static::where('unique_code', $code)->exists()) {
            $code = self::generateUniqueCode($length);
        }
    
        return $code;
    }
    
    public function mitra()
{
    return $this->belongsTo(Mitra::class, 'mitra_id');
}
public function gkuncis()
{
    return $this->belongsTo(Mitra::class, 'kuncis_id');
}
}
