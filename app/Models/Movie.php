<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'poster', 'is_showing_now', 'showing_date'];

    public function getPosterAttribute($value)
    {
        return '/images/movies/' . $value;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
