<?php

namespace App\Http\Controllers\API;

use App\Services\MultaService;
use App\Base\BaseController as BaseController;
use Illuminate\Http\Request;

class MultaApiController extends BaseController
{
    private $multaService;
    
    public function __construct(MultaService $multaService)
    {
        $this->multaService = $multaService;
    }

    public function index (Request $request)
    {
        $veiculo_id = $request['veiculo_id'];
        $multa_id = $request['multa_id'];
        return $this->sendResponse($this->multaService->list($veiculo_id, $multa_id), 'Veiculos retrieved successfully.');
    }
}
