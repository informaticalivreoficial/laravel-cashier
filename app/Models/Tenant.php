<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uuid',
        'status',
        'cnpj',
        'ie',
        'dominio',
        'template',
        //Imagens
        'logomarca',
        'favicon',        
        'metaimg',
        'imgheader',
        //Contato
        'telefone1',
        'telefone2',
        'telefone3',
        'whatsapp',
        'skype',
        'email',
        'email1',
        //Endereço
        'cep',
        'rua',
        'num',
        'complemento',
        'bairro',
        'uf',
        'cidade',
        //Social links
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'linkedin',
        'vimeo',
        'fliccr',
        'soundclound',
        'snapchat',
        //Seo
        'descricao',
        'mapa_google',
        'metatags'
    ];

    /**
     * Scopes
     */

     /**
     * Relacionamentos
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
