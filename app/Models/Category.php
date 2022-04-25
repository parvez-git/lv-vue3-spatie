<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','image'];

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    // public function getImageAttribute($value)
    // {
    //     if($value) {
    //         return Storage::url("images/" . $value);
    //     } 
    // }
}
