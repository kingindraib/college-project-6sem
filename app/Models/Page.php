<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class Page extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'image',
    ];
}
