<?php

namespace App\Repositories;

use App\Models\Multa;
use App\Base\BaseRepository;

class MultaRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(new Multa());
    }

    public function findAllBy($veiculo_id)
    {
        return parent::findAllByField('veiculo_id', $veiculo_id);
    }

    public function create($attributes): Multa
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

    public function destroy($id)
    {
        return parent::destroy($id);
    }
}
