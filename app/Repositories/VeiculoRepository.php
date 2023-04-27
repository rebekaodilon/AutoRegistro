<?php

namespace App\Repositories;

use App\Models\Veiculo;
use App\Base\BaseRepository;

class VeiculoRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(new Veiculo());
    }

    public function list($empresa_id)
    {
        return parent::findAllByField('empresa_id', $empresa_id);
    }

    public function create($attributes): Veiculo
    {
        return parent::create($attributes);
    }

    public function show($id)
    {
        return parent::find($id);
    }

    public function update($id, $attributes)
    {
        return parent::update($id, $attributes);
    }

    public function findById($id)
    {
        return parent::find($id);
    }

    public function destroy($id)
    {
        return parent::destroy($id);
    }
}
