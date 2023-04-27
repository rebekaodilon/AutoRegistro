<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'cnpj',
        'razao_social',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'telefone',
        'email',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
