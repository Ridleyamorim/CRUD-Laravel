<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Exception;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        try {
            $series = Serie::query()->orderBy('nome')->get();
            $mensagemSucesso = session('mensagem.sucesso');

            return view('series.index')
                ->with('series', $series)
                ->with('mensagem.sucesso', $mensagemSucesso)
            ;
        } catch (Exception $e) {
            $request->session()->flash($e);
        }
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series, Request $request)
    {
        Serie::destroy($request->id);

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série {'$series->nome'} atualizada com sucesso");
    }
}
