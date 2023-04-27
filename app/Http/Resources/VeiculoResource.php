<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VeiculoResource extends JsonResource
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
            'chassi'        => $this->chassi,
            'placa'         => $this->placa,
            'renavam'       => $this->renavam,
            'modelo'        => $this->modelo,
            'marca'         => $this->marca,
            'valor_compra'  => $this->valor_compra,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}
