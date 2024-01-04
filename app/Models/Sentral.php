<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentral extends Model
{

    protected $table = 'sentrals';
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'sentrals_id',
        'CITY',
        'SITE_ID',
        'INFRA_SYS_ID',
        'SITE_OWNER_ID',
        'INFRA_TYPE',
        'INFRA_SUB_TYPE',
        'ADDRESS',
        'LATITUDE',
        'LONGITUDE'
    ];

    public function engineers()
    {
        return $this->hasMany(Engineer::class, 'id_sentral');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_sentral');
    }

}
