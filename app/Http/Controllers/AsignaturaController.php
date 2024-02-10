<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsignaturaStoreRequest;
use App\Http\Requests\AsignaturaUpdateRequest;
use App\Models\Asignatura;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AsignaturaController extends Controller
{
    public function index(Request $request): Response
    {
        $asignaturas = Asignatura::all();

        return view('asignatura.index', compact('asignaturas'));
    }

    public function create(Request $request): Response
    {
        return view('asignatura.create');
    }

    public function store(AsignaturaStoreRequest $request): Response
    {
        $asignatura = Asignatura::create($request->validated());

        $request->session()->flash('asignatura.id', $asignatura->id);

        return redirect()->route('asignatura.index');
    }

    public function show(Request $request, Asignatura $asignatura): Response
    {
        return view('asignatura.show', compact('asignatura'));
    }

    public function edit(Request $request, Asignatura $asignatura): Response
    {
        return view('asignatura.edit', compact('asignatura'));
    }

    public function update(AsignaturaUpdateRequest $request, Asignatura $asignatura): Response
    {
        $asignatura->update($request->validated());

        $request->session()->flash('asignatura.id', $asignatura->id);

        return redirect()->route('asignatura.index');
    }

    public function destroy(Request $request, Asignatura $asignatura): Response
    {
        $asignatura->delete();

        return redirect()->route('asignatura.index');
    }
}
