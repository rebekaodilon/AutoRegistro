<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MultaService;
use App\Services\VeiculoService;

class MultasController extends Controller
{
    private $multaService;
    private $veiculoService;

    public function __construct(MultaService $MultaService, VeiculoService $VeiculoService)
    {
        $this->multaService = $MultaService;
        $this->veiculoService = $VeiculoService;
    }

    public function index($veiculo_id)
    {
        $multas = $this->multaService->list($veiculo_id);
        $empresa_id = $this->veiculoService->show($veiculo_id)->empresa_id;
        
        return view('multas.index', compact('multas', 'veiculo_id', 'empresa_id'));
    }

    public function create($veiculo_id)
    {
        return view('multas.create', compact('veiculo_id'));
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        
        $this->multaService->store($attributes);

        return redirect()->route('multas.index', $attributes['veiculo_id']);
    }

    public function edit($id)
    {
        $multa = $this->multaService->show($id);
        $veiculo_id = $multa->veiculo_id;
        return view('multas.edit', compact('multa', 'veiculo_id'));
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();
        $this->multaService->update($id, $attributes);

        return redirect()->route('multas.index', $attributes['veiculo_id']);
    }

    public function destroy(Request $request)
    {
        $id = $request->veiculo_id;
        $veiculo_id = $this->multaService->show($id)->veiculo_id;
        
        $this->multaService->destroy($id);

        return redirect()->route('multas.index', compact('veiculo_id'));
    }
}