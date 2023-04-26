<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'chassi',
        'placa',
        'renavam',
        'marca',
        'modelo',
        'valor_compra',
        'empresa_id',
        'created_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function multas()
    {
        return $this->hasMany(Multas::class);
    }
}
