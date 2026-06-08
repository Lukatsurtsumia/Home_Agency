<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class portfolioImage extends Model
{
    protected $fillable = [
        'portfolio_id',
        'image',
    ];

    public function portfolio()
    {
        return $this->belongsTo(portfolio::class);
    }
}
