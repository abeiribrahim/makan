<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
'category_id',
    'price',
    'bathn',
    'bedn',
    'area',
    'location',
    'rent',
    'sell',
    'image',
    'published',
];
public function category(){
    return $this->belongsTo(Category::class);
}
}
