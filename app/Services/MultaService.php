<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\MultaRepository;

class MultaService
{
    /**
     * @var MultaRepository
     */
    private $multaRepository;

    /**
     * UserService constructor.
     * @param MultaRepository $multaRepository
     *
     */

    public function __construct(MultaRepository $multaRepository)
    {
        $this->multaRepository = $multaRepository;
    }

    public function list($veiculo_id, $multa_id = null)
    {
        if(isset($multa_id))
        {
            $multa = $this->multaRepository->show($multa_id);

            $multa->valor = 'R$ ' . number_format($multa->valor, 2, ',', '.');
        }
        else {
            $multa = $this->multaRepository->findAllBy($veiculo_id);
            foreach ($multa as $value) {
                $value->valor = 'R$ ' . number_format($value->valor, 2, ',', '.');
            }
        }
        return $multa;
    }

    public function show($id)
    {
        return $this->multaRepository->show($id);
    }

    public function store($attributes)
    {
        
        if(isset($attributes['quitado']) == 0 && isset($attributes['quitacao']) == 'on') { unset($attributes['quitado']);}

        if(isset($attributes['quitacao']) == 'on')
        {
            $attributes['quitacao'] = 1;
            $attributes['quitacao_data_hora'] = date('Y-m-d H:i:s');
        }
        else
        {
            $attributes['quitacao'] = 0;
        }
        
        // Removendo primeiro caractere . do valor e trocando , por . para converter a string em float
        $attributes['valor'] = str_replace('.', '', $attributes['valor']);
        $attributes['valor'] = str_replace(',', '.', $attributes['valor']);

        //Convertendo valor para float
        $attributes['valor'] = number_format(floatval($attributes['valor']), 2, '.', '');

        return $this->multaRepository->create($attributes);
    }

    public function update($id, $attributes)
    {
        unset($attributes['_token']);
        unset($attributes['_method']);
        unset($attributes['quitado']);
        
        if(isset($attributes['quitacao']) == 'on' && $attributes['quitacao_data_hora'] == null)
        {
            $attributes['quitacao'] = 1;
            $attributes['quitacao_data_hora'] = date('Y-m-d H:i:s');
        }
        else if($attributes['quitacao_data_hora'] != null)
        {
            $attributes['quitacao'] = 1;
            $attributes['quitacao_data_hora'] = date('Y-m-d H:i:s', strtotime($attributes['quitacao_data_hora']));
        }
        else
        {
            $attributes['quitacao'] = 0;
            $attributes['quitacao_data_hora'] = null;
        }

         // Removendo primeiro caractere . do valor e trocando , por . para converter a string em float
        $attributes['valor'] = str_replace('.', '', $attributes['valor']);
        $attributes['valor'] = str_replace(',', '.', $attributes['valor']);

        //Convertendo valor para float
        $attributes['valor'] = number_format(floatval($attributes['valor']), 2, '.', '');

        return $this->multaRepository->update($id, $attributes);
    }

    public function destroy($id)
    {
        return $this->multaRepository->destroy($id);
    }

    public function deleteMultas($veiculo_id)
    {
        $multas = $this->multaRepository->findAllBy($veiculo_id);

        foreach ($multas as $multa) {
            $this->multaRepository->destroy($multa->id);
        }
    }

    public function somaMultas($veiculo_id)
    {
        $multas = $this->multaRepository->findAllBy($veiculo_id);
        $soma = 0;

        foreach ($multas as $multa) {
            $soma += $multa->valor;
        }

        return $soma;
    }
}
