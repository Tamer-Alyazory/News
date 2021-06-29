<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model 
{
    use HasFactory;
    protected $appends =['active-status'];

    
    public function getActiveStatusAttribute()
    {
        return $this->status ? 'Active' : 'InActive';
    }
public function article() {
    return $this->hasMany(article::class);       
}


public function categories() {
    return $this->belongsToMany(category::class, 'author_categories');
}

}