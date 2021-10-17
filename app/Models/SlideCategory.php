<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideCategory extends Model
{
    use HasFactory;

    const ACTIVO = 2;
    const INACTIVO = 1;

    protected $guarded = ['created_at', 'updated_at'];

    public function slides(){
        return $this->hasMany(Slide::class);
    }
}
