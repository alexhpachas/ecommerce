<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    /* RELACION UNO A MUCHOS ENTRE BRAND Y PRODUCTS */
    public function products(){
        return $this->hasMany(Product::class);
    }

    /* RELACION MUCHOS A MUCHOS ENTRE BRANDS Y CATEGORIE */

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
