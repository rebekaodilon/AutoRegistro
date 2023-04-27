<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\VeiculoRepository;
use App\Services\MultaService;

class VeiculoService
{
    /**
     * @var VeiculoRepository
     */
    private $veiculoRepository;
    private $multaService;

    /**
     * UserService constructor.
     * @param VeiculoRepository $veiculoRepository
     *
     */

    public function __construct(VeiculoRepository $veiculoRepository, MultaService $multaService)
    {
        $this->veiculoRepository = $veiculoRepository;
        $this->multaService = $multaService;
    }

    public function list($empresa_id, $veiculo_id = null)
    {
        if(isset($veiculo_id))
        {
            $veiculo = $this->veiculoRepository->show($veiculo_id);
            
            if ($veiculo == null) {
                return response()->json(['error' => 'Veículo não encontrado'], 404);
            }

            $veiculo->valor_compra = 'R$ ' . number_format($veiculo->valor_compra, 2, ',', '.');
        }
        else {
            $veiculo = $this->veiculoRepository->list($empresa_id);
            
            foreach ($veiculo as $value) {
                $value->valor_compra = 'R$ ' . number_format($value->valor_compra, 2, ',', '.');
            }
        }

        return $veiculo;
    }

    public function show($id)
    {
        return $this->veiculoRepository->show($id);
    }

    public function store($attributes)
    {
        // Removendo primeiro caractere . do valor_compra e trocando , por . para converter a string em float
        $attributes['valor_compra'] = str_replace('.', '', $attributes['valor_compra']);
        $attributes['valor_compra'] = str_replace(',', '.', $attributes['valor_compra']);

        //Convertendo valor_compra para float
        $attributes['valor_compra'] = number_format(floatval($attributes['valor_compra']), 2, '.', '');

        return $this->veiculoRepository->create($attributes);
    }

    public function update($id, $attributes)
    {
        unset($attributes['_token']);
        unset($attributes['_method']);

        // Removendo primeiro caractere . do valor_compra e trocando , por . para converter a string em float
        $attributes['valor_compra'] = str_replace('.', '', $attributes['valor_compra']);
        $attributes['valor_compra'] = str_replace(',', '.', $attributes['valor_compra']);

        //Convertendo valor_compra para float
        $attributes['valor_compra'] = number_format(floatval($attributes['valor_compra']), 2, '.', '');

        return $this->veiculoRepository->update($id, $attributes);
    }

    public function destroy($id)
    {
        //delete todas as multas do veiculo
        $this->multaService->deleteMultas($id);

        return $this->veiculoRepository->destroy($id);
    }

    public function multas($id)
    {
        $multa = $this->multaService->somaMultas($id);

        $multa = 'R$ ' . number_format($multa, 2, ',', '.');

        return $multa;
    }

}
