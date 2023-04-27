<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\EmpresaRepository;
use App\Services\VeiculoService;
use App\Services\MultaService;

class EmpresaService
{
    /**
     * @var EmpresaRepository
     */
    private $empresaRepository;
    private $veiculoService;
    private $multaService;

    /**
     * UserService constructor.
     * @param EmpresaRepository $empresaRepository
     *
     */

    public function __construct(EmpresaRepository $empresaRepository, VeiculoService $veiculoService, MultaService $multaService)
    {
        $this->empresaRepository = $empresaRepository;
        $this->veiculoService = $veiculoService;
        $this->multaService = $multaService;
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
        $attributes['cnpj'] = preg_replace('/[^0-9]/', '', $attributes['cnpj']);

        $attributes['endereco'] = $attributes['logradouro'];
        unset($attributes['logradouro']);

        return $this->empresaRepository->create($attributes);
    }

    public function update($id, $attributes)
    {
        unset($attributes['_token']);
        unset($attributes['_method']);
        return $this->empresaRepository->update($id, $attributes);
    }

    public function veiculos($empresa_id, $veiculo_id = null)
    {
        $veiculos = $this->veiculoService->list($empresa_id, $veiculo_id)->toArray();

        if($veiculo_id == null)
        {
            foreach ($veiculos as $key => $value) {
                $veiculos[$key]['multas'] = $this->multaService->list($value['id'])->toArray();

            }
            
            foreach ($veiculos as $key => $value) {
                $veiculos[$key]['total_multas'] = count($value['multas']);
            }
        }
        else {
            $veiculos['multas'] = $this->multaService->list($veiculos['id'])->toArray();
            $veiculos['total_multas'] = count($veiculos['multas']);
        }
    
        return $veiculos;
    }


}
