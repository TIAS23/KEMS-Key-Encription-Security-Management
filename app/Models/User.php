<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id_users',
        'users_id',
        'name',
        'email',
        'password',
        'role',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isEngineer()
    {
        return $this->role === 'engineer';
    }

    public function isMitra()
    {
        return $this->role === 'mitra';
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_users');
    }
    
public function mitra()
    {
        return $this->hasOne(Mitra::class);
    }
    public function mitras()
    {
        // Assuming 'id' is the primary key of the users table
        // Assuming 'user_id' is the foreign key in the mitras table
        return $this->hasMany(Mitra::class,  'id_users');
    }
    public function company()
    {
        return $this->belongsTo(CompanyData::class,'company_id', 'id');
    }

}
