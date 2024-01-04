<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    protected $table = 'company_data';
    public $timestamps = false;

    protected $primaryKey = 'id,company_id';

    protected $fillable = [
        'name_company',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'company_id', 'id');
    }
}
