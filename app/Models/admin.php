<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model

{
    use HasFactory;
    protected $guarded=[];
    protected $appends =['active-status'];

    
    public function getActiveStatusAttribute()
    {
        return $this->status ? 'Active' : 'InActive';
    }
   
//     public function article() {
//         return $this->hasMany(article::class);   
// }
}