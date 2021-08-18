<?php

use App\Models\Color;
use App\Models\Product;
    use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

/* FUNCION PARA TRAER EL STOCK DISPONIBLE DE LOS PRODUCTOS */
    function quantity($product_id,$color_id=null,$size_id = null){
        $product = Product::find($product_id); /* TRAIGO EL ID DEL PRODUCTO */

        if($size_id){ /* PREGUNTO SI HAY ALGUNA TALLA */
            $size = Size::find($size_id); /* TRAIGO EL ID DE ESA TALLA */
            $quantity = $size->colors->find($color_id)->pivot->quantity; /* TRAIGO EL STOCK DE LA TABLA PIVOT DE ESA TALLA QUE COINCIDA CON EL COLOR QUE SELECCIONAMOS  */
        }elseif($color_id){    /* CASO CONTRARIO SI NO HAY TALLA PREGUNTAMOS SI HAY COLOR */         
            $quantity = $product->colors->find($color_id)->pivot->quantity; /* TRAIGO EL STOCK DE LA TABLA PIVOT DEL PRODUCTO QUE COINCIDA CON EL COLOR SELECCIONADO */
        }else{ /* CASO CONTRARIO SI NO HAY NI TALLA NI COLOR */
            $quantity = $product->quantity; /* SOLO TRAIGO EL STOCK DEL PRODUCTO */
        }   
        
        return $quantity;
    }

    /* FUNCION PARA TRAER LA CANTIDAD DE STOCK DE UN PRODUCTO QUE SE VA A COMPRAR EN EL CARRITO DE COMPRAS */
    function qty_added($product_id,$color_id = null, $size_id = null){
        $cart = Cart::content();
        $item = $cart->where('id',$product_id)
                     ->where('options.color_id',$color_id)
                     ->where('options.size_id',$size_id)->first();

        if($item){
            return $item->qty;
        }
    }

    /* FUNCION PARA TRAER STOCK DISPONIBLE  (RESTA DEL STOCK DEL PRODUCTO - EL STOCK HA COMPRAR) */

    function aty_avaliable($product_id ,$color_id = null, $size_id = null){

        $stock = quantity($product_id, $color_id, $size_id) - qty_added($product_id,$color_id, $size_id) ;

        if($stock <= 0){

            $stock=0;
            return $stock;
            
        }else{
            
            return $stock;

        }


        /* return quantity($product_id, $color_id, $size_id) - qty_added($product_id,$color_id, $size_id) ; */

    }

    /* FUNCION PARA GUARDAR EL STOCK EN LA BD DESPUES DE UNA COMPRA  */

    function discount($item){

        $product = Product::find($item->id);
        
        $qty_available = aty_avaliable($item->id ,$item->options->color_id, $item->options->size_id);

        if ($item->options->size_id) {

            $size = Size::find($item->options->size_id);
            $size->colors()->detach($item->options->color_id);
            $size->colors()->attach([
            $item->options->color_id =>['quantity'=>$qty_available]
        ]);
            
        }elseif($item->options->color_id){

            
            $product->colors()->detach($item->options->color_id);

            $product->colors()->attach([
                $item->options->color_id => ['quantity' => $qty_available]
            ]);

        }else{
            $product->quantity = $qty_available;
            $product->save();
        }

        
    }


    /* FUNCIONA PARA DEVOLVER EL STOCK DE UNA COMPRA QUE NO HA SIDO PAGADA DESPUES DE 10 MINUTOS */
    function increase($item){

        $product = Product::find($item->id);
        
        $quantity = quantity($item->id ,$item->options->color_id, $item->options->size_id) + $item->qty;

        if ($item->options->size_id) {

            $size = Size::find($item->options->size_id);
            $size->colors()->detach($item->options->color_id);
            $size->colors()->attach([
            $item->options->color_id =>['quantity'=>$quantity]
        ]);
            
        }elseif($item->options->color_id){

            
            $product->colors()->detach($item->options->color_id);

            $product->colors()->attach([
                $item->options->color_id => ['quantity' => $quantity]
            ]);

        }else{
            $product->quantity = $quantity;
            $product->save();
        }

        
    }



    