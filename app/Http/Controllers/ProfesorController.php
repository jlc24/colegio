<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesorStoreRequest;
use App\Http\Requests\ProfesorUpdateRequest;
use App\Models\Profesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    public function index(Request $request): Response
    {
        $profesors = Profesor::all();

        return view('profesor.index', compact('profesors'));
    }

    public function create(Request $request): Response
    {
        return view('profesor.create');
    }

    public function store(ProfesorStoreRequest $request): Response
    {
        $profesor = Profesor::create($request->validated());

        $request->session()->flash('profesor.id', $profesor->id);

        return redirect()->route('profesor.index');
    }

    public function show(Request $request, Profesor $profesor): Response
    {
        return view('profesor.show', compact('profesor'));
    }

    public function edit(Request $request, Profesor $profesor): Response
    {
        return view('profesor.edit', compact('profesor'));
    }

    public function update(ProfesorUpdateRequest $request, Profesor $profesor): Response
    {
        $profesor->update($request->validated());

        $request->session()->flash('profesor.id', $profesor->id);

        return redirect()->route('profesor.index');
    }

    public function destroy(Request $request, Profesor $profesor): Response
    {
        $profesor->delete();

        return redirect()->route('profesor.index');
    }
}
