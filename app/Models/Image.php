<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 * @mixin Builder
 */
class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $guarded = [];


    public function getPathAttribute($value)
    {
        return 'storage/images/' . $value;
    }
}
