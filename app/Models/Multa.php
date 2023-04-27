<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'descricao',
        'orgao',
        'valor',
        'quitacao',
        'quitacao_data_hora',
        'veiculo_id',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
