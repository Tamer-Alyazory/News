<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class author extends Authenticatable 
{
    use HasFactory ,HasRoles;
    protected $appends =['active-status'];

    
    public function getActiveStatusAttribute()
    {
        return $this->status ? 'Active' : 'InActive';
    }
public function article() {
    return $this->hasMany(article::class);       
}


// public function categories() {
//     return $this->belongsToMany(category::class);
// }
public function user (){

    return $this->morphOne(User::class , 'actor','actor_type' , 'actor_id', 'id');
}
public function category() {
    return $this->belongsToMany(category::class, 'author_categories');
}

}