<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\EmpresaRepository;

class EmpresaService
{
    /**
     * @var BookRepository
     */
    private $empresaRepository;

    /**
     * UserService constructor.
     * @param EmpresaRepository $empresaRepository
     *
     */

    public function __construct(EmpresaRepository $empresaRepository)
    {
        $this->empresaRepository = $empresaRepository;
    }

    public function list()
    {
        return $this->empresaRepository->list();
    }

    public function show($id)
    {
        return $this->empresaRepository->show($id);
    }

    public function store($attributes)
    {
        return $this->empresaRepository->create($attributes);
    }

    public function update($id, $attributes)
    {
        unset($attributes['_token']);
        unset($attributes['_method']);
        return $this->empresaRepository->update($id, $attributes);
    }

    public function delete($id)
    {
        
    }


}
