<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function ideas()
    {
        return $this->belongsTo(Idea::class, 'idea_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
