<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('Mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagem.sucesso', $mensagemSucesso)
        ;  
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());

        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        session()->flash('mensagem.sucesso', 'Série removida com sucesso');

        return to_route('series.index');
    }
}
