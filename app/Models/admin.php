<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class admin extends Authenticatable

{
    use HasFactory , HasRoles;
    protected $guarded=[];
    protected $appends =['active-status'];


    public function getActiveStatusAttribute()
    {
        return $this->status ? 'Active' : 'InActive';
    }
    public function getFullNameAttribute()
    {
        return $this->user->name;
    }
    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
    }

//     public function article() {
//         return $this->hasMany(article::class);
// }
}
