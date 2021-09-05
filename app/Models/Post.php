<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; 

    protected $fillable = [
        'autor',
        'tipo',
        'titulo',
        'content',
        'slug',
        'tags',
        'views',
        'categoria',
        'comentarios',
        'cat_pai',        
        'status',
        'thumb_legenda',
        'publish_at'
    ];
}
