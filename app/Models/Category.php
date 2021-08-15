<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =['name','slug','icon','image'];

    /* RELACION ENTRE CATEGORIA Y SUBCATEGORIA -> UNO A MUCHOS */

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    /* RELACION ENTRE CATEGORIA Y MARCA  -> MUCHOS A MUCHOS */

    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    /* RELACION ENTRE CATEGORIA Y PRODUCTO A TRAVEZ DE  */
    public function products(){
        return $this->hasManyThrough(Product::class,Subcategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
