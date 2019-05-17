<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable = [
        'name',
        'cover',
        'description',
        'slug',
        'status',
        'view',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'rate',
        'total_rate',
    ];
}
