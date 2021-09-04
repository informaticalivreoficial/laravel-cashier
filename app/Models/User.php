<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'email1',
        'password',
        'remember_token',
        'senha',
        'genero',
        'cpf',
        'rg',
        'rg_expedicao',
        'nasc',
        'naturalidade',
        'estado_civil',
        'avatar',
        'profissao',
        'renda',
        'profissao_empresa',
        'cep',
        'rua',
        'num',
        'complemento',
        'bairro',
        'uf',
        'cidade',
        'telefone',
        'celular',
        'whatsapp',
        'skype',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'vimeo',
        'youtube',
        'fliccr',
        'soundclound',
        'snapchat',
        'tipo_de_comunhao',
        'nome_conjuje',
        'genero_conjuje',
        'cpf_conjuje',
        'rg_conjuje',
        'rg_expedicao_conjuje',
        'nasc_conjuje',
        'naturalidade_conjuje',
        'admin',
        'client',
        'editor',
        'superadmin',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacionamentos
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

     /**
     * Scopes
     */

     /**
     * Accerssors and Mutators
     */
}
