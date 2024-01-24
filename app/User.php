<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
// use IvanoMatteo\LaravelDeviceTracking\Traits\UseDevices;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;
    // use UseDevices;

    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
            'first_name' . ' as first_name',
        	'last_name' . ' as last_name',
            'email'. ' as email',
        	'country'  . ' as country',
        	'city' . ' as city',
            'gender'  . ' as gender',
            'bio'  . ' as bio',
            'dateOfBirth'  . ' as dateOfBirth',
            'mobile'  . ' as mobile',
            'address'  . ' as address',
            'photo' . ' as photo',
            'type'  . ' as type',
            'height'  . ' as height',
            'weight'  . ' as weight',
            'bloode_group'  . ' as bloode_group',
            'marital_status'  . ' as marital_status',
            'experience' . ' as experience',
        );
    }
    protected $fillable = [
        'name', 'email', 'password','is_activated','first_name','last_name','mobile','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name'=>'array'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
