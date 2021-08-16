<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id','status','created_at','updated_at'];

    /* TIPOS DE ORDENES */
    const PENDIENTE = 1;  /* SI CLIENTE COMPRA PERO AUN NO HA PAGADO */
    const RECIBIDO = 2;  /* CUANDO EL CLIENTE YA PAGO */
    const ENVIADO = 3;  /* EL PEDIDO FUE ENVIADO */
    const ENTREGADO = 4; /* EL PEDIDO FUE ENTREGADO */
    const ANULADO = 5;  /* EL CLIENTE NO PAGO, ASI QUE SE PASA A ANULADO */
    
    /* RELACION UNO A MUCHOS ENTRE DEPARTAMENT Y ORDERS -> INVERSA */

    public function department(){
        return $this->belongsTo(Department::class);
    }

    /* RELACION UNO A MUCHOS ENTRE CITIES Y ORDERS  -> INVERSA BelongsTo */

    public function city(){
        return $this->belongsTo(City::class);
    }

    /* RELACION DE UNO A MUCHOS ENTRE DISTRITO Y ORDERS -> INVERSA bellongsTo */

    public function district(){
        return $this->belongsTo(District::class);
    }

    /* RELACION DE UNO A MUCHOS ENTRE USUARIOS Y ORDERS -> INVERSA belongsTo */
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}

