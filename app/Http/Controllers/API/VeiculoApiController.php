<?php

namespace App\Http\Controllers\API;

use App\Services\VeiculoService;
use App\Base\BaseController as BaseController;
use Illuminate\Http\Request;

class VeiculoApiController extends BaseController
{
    private $veiculoService;
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(VeiculoService $veiculoService)
    {
        $this->veiculoService = $veiculoService;
    }

    public function index (Request $request)
    {
        $empresa_id = $request['empresa_id'];
        $veiculo_id = $request['veiculo_id'];
        return $this->sendResponse($this->veiculoService->list($empresa_id, $veiculo_id), 'Veiculos retrieved successfully.');
    }

    public function multas (Request $request)
    {
        $total_multas = $this->veiculoService->multas($request->all());

        return $this->sendResponse('O total de multas desse veículo é de '.$total_multas, 'Veiculos retrieved successfully.');
    }
}
