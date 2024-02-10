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
    public function index()
    {
        return view('profesor.index');
    }

    public function create(Request $request)
    {
        //
    }

    public function store(ProfesorStoreRequest $request)
    {
        $request->validated();
        $existe = Profesor::where([
            ['ci', $request->input('ci')],
            ['nombres', $request->input('nombres')],
            ['apellidos', $request->input('apellidos')]
        ])->exists();

        if ($existe) {
            return response()->json([
                'resultado' => 'si'
            ]);
        }else{
            Profesor::create([
                'ci' => $request->input('ci'),
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'direccion' => $request->input('direccion'),
                'fec_nac' => $request->input('fec_nac'),
                'especialidad' => $request->input('especialidad'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono')
            ]);

            return response()->json([
                'resultado' => 'no'
            ]);
        }
    }

    public function show()
    {
        $profesores = Profesor::all();
        return response()->json($profesores);
    }

    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return response()->json($profesor);
    }

    public function update(ProfesorUpdateRequest $request, $id)
    {
        $request->validated();
        
        $profesor = Profesor::find($id);
        $profesor->update([
            'ci' => $request->input('ci'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'direccion' => $request->input('direccion'),
            'fec_nac' => $request->input('fec_nac'),
            'especialidad' => $request->input('especialidad'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono')
        ]);
    }

    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        $profesor->delete();
    }

    public function cambiarEstadoProfesor($id) {
        $profesor = Profesor::find($id);

        $estado = $profesor->estado == '1' ? '0' : '1';
        $profesor->update([
            'estado' => $estado
        ]);

        return response()->json([
            'resultado' => 'ok'
        ]);
    }
}
