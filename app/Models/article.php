<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    public function image(){
        return $this->hasMany(image::class);       
    }
    public function category(){
        return $this->belongsTo(category::class);       
    }
    public function author(){
        return $this->belongsTo(author::class);       
    }
}
