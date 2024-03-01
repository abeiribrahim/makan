<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
  'fname',
  'image',
  'designation',
  'facebook_url',
  'twitter_url',
  'instagram_url',
];
}
