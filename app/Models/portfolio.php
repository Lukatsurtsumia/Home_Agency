<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $fillable = [
        'title',
        'address',
        'area',
        'rooms',
        'price',
        'description',
        'cover_image',
        'lat',
        'lng'
    ];

    public function images()
    {
        return $this->hasMany(portfolioImage::class);
    }
}
