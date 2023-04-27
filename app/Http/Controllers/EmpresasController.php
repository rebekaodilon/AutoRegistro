<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresasRequest;
use App\Services\EmpresaService;
use Illuminate\Support\Facades\Auth;

class EmpresasController extends Controller
{
    private $empresaService;
    
    public function __construct(EmpresaService $empresaService)
    {
        $this->empresaService = $empresaService;
    }

    public function index ()
    {
        $empresas = $this->empresaService->list();
        
        return view('empresa.index', compact('empresas'));

    }

    public function create ()
    {
        return view('empresa.create');
    }

    public function store (Request $request)
    {
        $empresa = $this->empresaService->store($request->all());

        if (empty($empresa)) {
            return response()->json(['message' => 'Erro ao cadastrar empresa'], 500);
        }

        return redirect()->route('empresas.index')->with('success', 'Empresa cadastrada com sucesso!');
    }

    public function edit ($id)
    {
        $empresa = $this->empresaService->show($id)->toArray();
        
        return view('empresa.edit', compact('empresa'));
    }

    public function update (Request $request, $id)
    {
        $empresa = $this->empresaService->update($id, $request->all());

        if (empty($empresa)) {
            return response()->json(['message' => 'Erro ao atualizar empresa'], 500);
        }

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!');
    }
}
