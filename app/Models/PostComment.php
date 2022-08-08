<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'name',
        'comment',
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getNicknameAttribute()
    {
        return $this->user ? $this->user->name : $this->name;
    }
}
