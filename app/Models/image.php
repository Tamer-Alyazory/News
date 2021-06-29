<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $appends =['active-status'];

    
    public function getActiveStatusAttribute()
    {
        return $this->status ? 'Visible' : 'InVisible';
    }
    public function article(){
        return $this->belongsTo(artical::class);       
    }
}
