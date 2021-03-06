<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];

    public function SlideCategory(){
        return $this->belongsTo(SlideCategory::class);
    }
}
