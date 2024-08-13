<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesystemTrait;

class Gallery extends Model
{
    use HasFactory,FilesystemTrait;

    protected $fillable = [
        'data_id','type','path'
    ];
}
