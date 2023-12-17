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

    public function belongs()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Categories','category_id','id');
    }
}
