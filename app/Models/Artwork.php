<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'image1', 'image2', 'image3', 'image4', 'description', 'price', 'dimensions'
    ];
}
