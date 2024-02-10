<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorarioStoreRequest;
use App\Http\Requests\HorarioUpdateRequest;
use App\Models\Horario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HorarioController extends Controller
{
    public function index(Request $request): Response
    {
        $horarios = Horario::all();

        return view('horario.index', compact('horarios'));
    }

    public function create(Request $request): Response
    {
        return view('horario.create');
    }

    public function store(HorarioStoreRequest $request): Response
    {
        $horario = Horario::create($request->validated());

        $request->session()->flash('horario.id', $horario->id);

        return redirect()->route('horario.index');
    }

    public function show(Request $request, Horario $horario): Response
    {
        return view('horario.show', compact('horario'));
    }

    public function edit(Request $request, Horario $horario): Response
    {
        return view('horario.edit', compact('horario'));
    }

    public function update(HorarioUpdateRequest $request, Horario $horario): Response
    {
        $horario->update($request->validated());

        $request->session()->flash('horario.id', $horario->id);

        return redirect()->route('horario.index');
    }

    public function destroy(Request $request, Horario $horario): Response
    {
        $horario->delete();

        return redirect()->route('horario.index');
    }
}
