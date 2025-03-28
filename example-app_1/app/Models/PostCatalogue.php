<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;


class PostCatalogue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // 'name',
        'parentid',
        'lft',
        'rgt',
        'level',
        'image',
        'icon',
        'album',
        'publish',
        'follow',
        'order',
        'user_id',
    ];

    protected $table = 'post_catalogues';

    public function languages(){
        return $this->belongsToMany(Language::class, 'post_catalogue_language', 'post_catalogue_id', 'language_id')->withPivot('name','canonical',
        'meta_title', 'meta_keyword', 'meta_description', 'viewed', 'description', 'content')->withTimestamps();
    }
    public function post_catalogue_language(){
        return $this->hasMany(PostCatalogueLanguage::class, 'post_catalogue_id', 'id');
    }
 
}
