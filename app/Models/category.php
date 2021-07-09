<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class category extends Model
{
    use HasFactory , HasRoles;
    protected $appends =['active-status'];

    
    public function getActiveStatusAttribute()
    {
        return $this->status ? 'Active' : 'InActive';
    }
    public function article(){
        return $this->hasMany(article::class, 'category_id','id');         
        
    }
 

    public function authors() {
        return $this->belongsToMany(author::class, 'author_categories');
    }
}
