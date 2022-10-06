<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=["body","user_id","post_id","parent_id"];

    public function subComments()
    {
        return $this->hasMany(Comment::class,"parent_id");
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class,"parent_id");
    }

    public function author()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
