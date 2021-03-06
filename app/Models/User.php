<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/*  CLASE PARA USAR CASHIER */
use Laravel\Cashier\Billable;

/* IMPORTAMOS ESA CLASE PARA IMPLEMENTAR LARAVEL PERMISSION */
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Billable; //Clase para poder usar metodos de cashier
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /* LARAVEL PERMISSION */
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'dni',
        'phone',
        'password',
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /* UN USUARIO PUEDE TENER MUCHAS ORDENES UNO A MUCHOS HasMany */
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function qualifies(){
        return $this->hasMany(Qualify::class);
    }

    public function image(){

        $social_profile = $this->socialProfiles()->first();

        if ($social_profile) {
            return $social_profile->social_avatar;
        }
        
    }

    /* RELACION UNO A MUCHOS  */

    public function socialProfiles(){
        return $this->hasMany(SocialProfile::class);
    }

    

  
}
