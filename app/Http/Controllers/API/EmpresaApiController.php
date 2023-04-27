<?php

namespace App\Http\Controllers\API;

use App\Services\EmpresaService;
use App\Base\BaseController as BaseController;
use Illuminate\Http\Request;

class EmpresaApiController extends BaseController
{
    private $empresaService;
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(EmpresaService $empresaService)
    {
        $this->empresaService = $empresaService;
    }

    public function index ()
    {
        return $this->sendResponse($this->empresaService->list(), 'Empresas retrieved successfully.');
    }

    public function show($id)
    {
        $empresa = $this->empresaService->show($id);

        if (is_null($empresa)) {
            return $this->sendError('Empresa not found.');
        }

        return $this->sendResponse($empresa, 'Empresa retrieved successfully.');
    }

    public function veiculos($empresa_id, Request $request)
    {
        return $this->sendResponse($this->empresaService->veiculos($empresa_id, $request->veiculo_id, $request->multas), 'Veiculos retrieved successfully.');
    }
}
