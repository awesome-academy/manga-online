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
        'image',
        'count_comment',
    ];

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'author_manga');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_manga');
    }

    public function translateGroups()
    {
        return $this->belongsToMany('App\Models\TranslateGroup', 'manga_translate_group');
    }

    public function chapters(){
        return $this->hasMany('App\Models\Chapter');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
