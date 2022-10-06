<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=["title","slug","description","body","published_at","category_id","user_id"];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
