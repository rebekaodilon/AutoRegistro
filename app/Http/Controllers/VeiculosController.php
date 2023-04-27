<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VeiculoService;
 
class VeiculosController extends Controller
{
    private $veiculoService;

    public function __construct(VeiculoService $veiculoService)
    {
        $this->veiculoService = $veiculoService;
    }

    public function index($empresa_id)
    {
        $veiculos = $this->veiculoService->list($empresa_id);
        return view('veiculos.index', compact('veiculos', 'empresa_id'));
    }

    public function create($empresa_id)
    {
        return view('veiculos.create', compact('empresa_id'));
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $this->veiculoService->store($attributes);

        return redirect()->route('veiculos.index', $attributes['empresa_id']);
    }

    public function edit($id)
    {
        $veiculo = $this->veiculoService->show($id);
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();
        $this->veiculoService->update($id, $attributes);

        return redirect()->route('veiculos.index', $attributes['empresa_id']);
    }

    public function destroy(Request $request)
    {
        $id = $request->veiculo_id;
        $empresa_id = $this->veiculoService->show($id)->empresa_id;
        
        $this->veiculoService->destroy($id);

        return redirect()->route('veiculos.index', compact('empresa_id'));
    }
}