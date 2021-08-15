<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /* RELACION ENTRE COLOR Y PRODUCT MUCHOS A MUCHOS */

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    /* RELACION ENTRE COLOR Y SIZE  MUCHOS A MUCHOS  */

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
}
