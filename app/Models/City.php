<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name','cost','department_id'];

    /* UNA CUIDAD PUEDE TENER MUCHOS DISTRITOS */

    public function districts(){
        return $this->hasMany(District::class);
    }
    
    /* UNA CUIDAD PUEDE TENER MUCHAS ORDENES -> UNO A MUCHOS HasMany */
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
