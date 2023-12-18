<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'material',
        'price',
        'dimension',
        'description',
        'images',
        'armored',
        'hidden'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
