<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use App\Models\Post;
class Author extends User
{

    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }
}
