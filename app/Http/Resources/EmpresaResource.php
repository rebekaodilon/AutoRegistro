<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'cnpj'          => $this->cnpj,
            'razao_social'  => $this->razao_social,
            'endereco'      => $this->endereco,
            'numero'        => $this->numero,
            'complemento'   => $this->complemento,
            'bairro'        => $this->bairro,
            'cep'           => $this->cep,
            'telefone'      => $this->telefone,
            'email'         => $this->email,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}
