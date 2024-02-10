<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParaleloStoreRequest;
use App\Http\Requests\ParaleloUpdateRequest;
use App\Models\Paralelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ParaleloController extends Controller
{
    public function index(Request $request): Response
    {
        $paralelos = Paralelo::all();

        return view('paralelo.index', compact('paralelos'));
    }

    public function create(Request $request): Response
    {
        return view('paralelo.create');
    }

    public function store(ParaleloStoreRequest $request): Response
    {
        $paralelo = Paralelo::create($request->validated());

        $request->session()->flash('paralelo.id', $paralelo->id);

        return redirect()->route('paralelo.index');
    }

    public function show(Request $request, Paralelo $paralelo): Response
    {
        return view('paralelo.show', compact('paralelo'));
    }

    public function edit(Request $request, Paralelo $paralelo): Response
    {
        return view('paralelo.edit', compact('paralelo'));
    }

    public function update(ParaleloUpdateRequest $request, Paralelo $paralelo): Response
    {
        $paralelo->update($request->validated());

        $request->session()->flash('paralelo.id', $paralelo->id);

        return redirect()->route('paralelo.index');
    }

    public function destroy(Request $request, Paralelo $paralelo): Response
    {
        $paralelo->delete();

        return redirect()->route('paralelo.index');
    }
}
