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
}
