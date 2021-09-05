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
        'tenant_id',
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
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user', 'id');
    }

     /**
     * Scopes
     */

     /**
     * Accerssors and Mutators
     */
    
    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }
        $this->attributes['senha'] = $value;
        $this->attributes['password'] = bcrypt($value);
    } 
    
    public function setRememberTokenAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['remember_token']);
            return;
        }
        $this->attributes['remember_token'] = bcrypt($value);
    }

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = (!empty($value) ? $this->clearField($value) : null);
    }
    
    public function getCpfAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return
            substr($value, 0, 3) . '.' .
            substr($value, 3, 3) . '.' .
            substr($value, 6, 3) . '-' .
            substr($value, 9, 2);
    }

    public function setCpfconjujeAttribute($value)
    {
        $this->attributes['cpf_conjuje'] = (!empty($value) ? $this->clearField($value) : null);
    }
    
    public function getCpfconjujeAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return
            substr($value, 0, 3) . '.' .
            substr($value, 3, 3) . '.' .
            substr($value, 6, 3) . '-' .
            substr($value, 9, 2);
    }

    private function convertStringToDouble(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }
    
    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
    
    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}
