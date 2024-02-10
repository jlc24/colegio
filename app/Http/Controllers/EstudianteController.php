<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudianteStoreRequest;
use App\Http\Requests\EstudianteUpdateRequest;
use App\Models\Estudiante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstudianteController extends Controller
{
    public function index(Request $request): Response
    {
        $estudiantes = Estudiante::all();

        return view('estudiante.index', compact('estudiantes'));
    }

    public function create(Request $request): Response
    {
        return view('estudiante.create');
    }

    public function store(EstudianteStoreRequest $request): Response
    {
        $estudiante = Estudiante::create($request->validated());

        $request->session()->flash('estudiante.id', $estudiante->id);

        return redirect()->route('estudiante.index');
    }

    public function show(Request $request, Estudiante $estudiante): Response
    {
        return view('estudiante.show', compact('estudiante'));
    }

    public function edit(Request $request, Estudiante $estudiante): Response
    {
        return view('estudiante.edit', compact('estudiante'));
    }

    public function update(EstudianteUpdateRequest $request, Estudiante $estudiante): Response
    {
        $estudiante->update($request->validated());

        $request->session()->flash('estudiante.id', $estudiante->id);

        return redirect()->route('estudiante.index');
    }

    public function destroy(Request $request, Estudiante $estudiante): Response
    {
        $estudiante->delete();

        return redirect()->route('estudiante.index');
    }
}
