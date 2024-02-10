<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoStoreRequest;
use App\Http\Requests\CursoUpdateRequest;
use App\Models\Curso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CursoController extends Controller
{
    public function index(Request $request): Response
    {
        $cursos = Curso::all();

        return view('curso.index', compact('cursos'));
    }

    public function create(Request $request): Response
    {
        return view('curso.create');
    }

    public function store(CursoStoreRequest $request): Response
    {
        $curso = Curso::create($request->validated());

        $request->session()->flash('curso.id', $curso->id);

        return redirect()->route('curso.index');
    }

    public function show(Request $request, Curso $curso): Response
    {
        return view('curso.show', compact('curso'));
    }

    public function edit(Request $request, Curso $curso): Response
    {
        return view('curso.edit', compact('curso'));
    }

    public function update(CursoUpdateRequest $request, Curso $curso): Response
    {
        $curso->update($request->validated());

        $request->session()->flash('curso.id', $curso->id);

        return redirect()->route('curso.index');
    }

    public function destroy(Request $request, Curso $curso): Response
    {
        $curso->delete();

        return redirect()->route('curso.index');
    }
}
