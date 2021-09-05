<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Tenant\Traits\TenantTrait;

class Post extends Model
{
    use TenantTrait;
    use HasFactory;

    protected $table = 'posts'; 

    protected $fillable = [
        'autor',
        'tenant_id',
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

    /**
     * Scopes
     */
    public function scopePostson($query)
    {
        return $query->where('status', 1);
    }
    
    public function scopePostsoff($query)
    {
        return $query->where('status', 0);
    }

      /**
     * Relacionamentos
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'autor', 'id');
    }
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

     /**
     * Accerssors and Mutators
     */
}
