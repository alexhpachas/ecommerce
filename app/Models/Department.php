<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /* UN DEPARTAMENTO PUEDE TENER MUCHAS CUIDADES -> UNO A MUCHOS HasMany */
    public function cities(){
        return $this->hasMany(City::class);
    }

    /* UN DEPARTAMENTO PUEDE TENER MUCHAS ORDENES -> UNO A MUCHOS HasMany */
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
