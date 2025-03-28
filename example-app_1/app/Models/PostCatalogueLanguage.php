<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

class PostCatalogueLanguage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'post_catalogues_language';

    public function post_catalogues(){
        return $this->belongsTo(PostCatalogue::class, 'post_catalogue_id', 'id');
    }
    
}
