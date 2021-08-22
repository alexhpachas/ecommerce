<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id'];

    /* RELACION ENTRE SIZES Y PRODUCT  UNO A MUCHOS INVERSA */

    public function product(){
        return $this->belongsTo(Product::class);
    }

    /* RELACION ENTRE SIZES Y COLOR SIZE MUCHOS A MUCHOS YA QUE HAY TABLA INTERMEDIA */

    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity','id');
    }
}
