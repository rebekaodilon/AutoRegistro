<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Base\BaseRepository;

class EmpresaRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(new Empresa());
    }

    public function list()
    {
        return parent::findAll();
    }

    public function create($attributes): Empresa
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
}
