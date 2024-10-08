<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'category_level',
        'parent_id',
        'status',
        'order'
    ];

    public function post_count(){
        return Post::where('category_id', $this->id)->count();
    }
}
