<?php

namespace App\Http\Controllers;

use App\Http\Requests\NivelStoreRequest;
use App\Http\Requests\NivelUpdateRequest;
use App\Models\Nivel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NivelController extends Controller
{
    public function index(Request $request): Response
    {
        $nivels = Nivel::all();

        return view('nivel.index', compact('nivels'));
    }

    public function create(Request $request): Response
    {
        return view('nivel.create');
    }

    public function store(NivelStoreRequest $request): Response
    {
        $nivel = Nivel::create($request->validated());

        $request->session()->flash('nivel.id', $nivel->id);

        return redirect()->route('nivel.index');
    }

    public function show(Request $request, Nivel $nivel): Response
    {
        return view('nivel.show', compact('nivel'));
    }

    public function edit(Request $request, Nivel $nivel): Response
    {
        return view('nivel.edit', compact('nivel'));
    }

    public function update(NivelUpdateRequest $request, Nivel $nivel): Response
    {
        $nivel->update($request->validated());

        $request->session()->flash('nivel.id', $nivel->id);

        return redirect()->route('nivel.index');
    }

    public function destroy(Request $request, Nivel $nivel): Response
    {
        $nivel->delete();

        return redirect()->route('nivel.index');
    }
}
