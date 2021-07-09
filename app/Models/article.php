<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class article extends Model
{
    use HasFactory ,HasRoles;
   
    public function category(){
        return $this->belongsTo(category::class);       
    }
    public function author(){
        return $this->belongsTo(author::class);       
    }
    public function image(){
        return $this->hasMany(image::class);       
    }
}
