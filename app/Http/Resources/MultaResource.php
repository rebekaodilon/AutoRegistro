<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MultaResource extends JsonResource
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
            'veiculo_id'            => $this->veiculo_id,
            'descricao'             => $this->descricao,
            'orgao'                 => $this->orgao,
            'valor'                 => $this->valor,
            'quitacao'              => $this->quitacao,
            'quitacao_data_hora'    => $this->quitacao_data_hora,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at
        ];
    }
}
