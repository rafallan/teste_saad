<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjetoController extends Controller
{
    public function index()
    {
        return Inertia::render('Projetos/Index', [
            'projetos' => Projeto::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Projetos/Create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date|after:data_termino',

        ]);
    }

    public function storeMembro(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'carga_horaria_semanal' => 'required|numeric'

        ]);

    }

}
