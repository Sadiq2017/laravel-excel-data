<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $guarded = [];

    protected $casts = [
        'images' => 'json'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

}
