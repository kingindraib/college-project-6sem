<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;
use App\Models\Category;
use App\Models\User;
use App\Models\PostMeta;

class Post extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'slug',
        'image',
        'description',
        'status',
    ] ;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postMeta(){
        return PostMeta::where('post_id', $this->id)->first();
    }
}
