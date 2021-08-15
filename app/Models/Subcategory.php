<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    /* RELACION UNO A MUCHOS ENTRE SUBCATEGORIA Y PRODUCTOS */

    public function products(){
        return $this->hasMany(Product::class);
    }

    /* RELACION UNO A MUCHOS INVERSA ENTRE SUBCATEGORIA Y CATEGORIA */

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
