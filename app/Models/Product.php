<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const BORRADOR=1;
    const PUBLICADO=2;

    protected $guarded = ['id','created_at','updated_at'];

    /* ACCESORES */

    public function getStockAttribute(){
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function(Builder $query){
                        $query->where('id',$this->id);
            })->sum('quantity');
        } elseif($this->subcategory->color) {
            return ColorProduct::whereHas('product',function(Builder $query){
                        $query->where('id',$this->id);
            })->sum('quantity');
        }else{
            return $this->quantity;
        }
        
    }

    /* RELACION ENTRE PRODUCTOS Y MARCAS  UNO A MUCHOS INVERSA POR QUE VA DESDE PRODUCTOS HASTA BRANDS */

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    /* RELACION ENTRE PRODUCTS Y SUBCATEGORI DE UNO A MUCHOS INVERSA */

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    /* RELACION ENTRE PRODUCTO Y COLOR  MUCHOS A MUCHOS POR QUE HAY UNA TABLA INTERMEDIA */

    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    /* RELACION ENTRE PRODUCTS Y SIZES  UNO A MUCHOS */

    public function sizes(){
        return $this->hasMany(Size::class);
    }

    /* RELACION ENTRE PRODUCTS Y IMAGE  UNO A MUCHOS POLIMORFICA */

    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }

    /*  URL AMIGABLE */

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
