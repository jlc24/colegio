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
    public function index()
    {
        return view('estudiante.index');
    }

    public function create(Request $request)
    {
        //
    }

    public function store(EstudianteStoreRequest $request)
    {
        $request->validated();
        $existe = Estudiante::where([
            ['ci', $request->input('ci')],
            ['nombres', $request->input('nombres')],
            ['apellidos', $request->input('apellidos')]
        ])->exists();

        if ($existe) {
            return response()->json([
                'resultado' => 'si'
            ]);
        }else{
            Estudiante::create([
                'ci' => $request->input('ci'),
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'direccion' => $request->input('direccion'),
                'fec_nac' => $request->input('fec_nac'),
                'genero' => $request->input('genero'),
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
        $estudiantes = Estudiante::all();
        return response()->json($estudiantes);
    }

    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return response()->json($estudiante);
    }

    public function update(EstudianteUpdateRequest $request, $id)
    {
        $request->validated();
        
        $estudiante = Estudiante::find($id);
        $estudiante->update([
            'ci' => $request->input('ci'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'direccion' => $request->input('direccion'),
            'fec_nac' => $request->input('fec_nac'),
            'genero' => $request->input('genero'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono')
        ]);
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
    }

    public function cambiarEstadoEstudiante($id) {
        $estudiante = Estudiante::find($id);

        $estado = $estudiante->estado == '1' ? '0' : '1';
        $estudiante->update([
            'estado' => $estado
        ]);

        return response()->json([
            'resultado' => 'ok'
        ]);
    }
}
