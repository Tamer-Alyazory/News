<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author_categories extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->morphOne(user::class, 'actor', 'actor_type', 'actor_id', 'id');
    }
}
