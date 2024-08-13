<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'parent_menu',
        'menu_position',
        'menu_type'
    ] ;

    public function submenuName()
    {
        return $this->belongsTo(Menu::class, 'id');
    }
}
