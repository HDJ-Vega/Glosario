<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Conceptos;

class ConceptosController extends Controller
{
    public function register(Request $request)
    {
        $concept = new Conceptos();
        $concept->name = $request->name;
        $concept->concepto = $request->concepto;
        $concept->referencia = $request->referencia;
        $texto = $request->input('name');
        $primeraLetra = strtoupper(Str::substr($texto,0,1));
        $concept->indice=$primeraLetra;
        $concept->save();
        return response()->json(['message' => 'Concepto creado con exito :D goku le gana', 'estado' => 'ok']);
    }

    public function update(Request $request, $id)
    {
        $concept = Conceptos::findOrFail($id);
        $concept->name = $request->name;
        $concept->concepto = $request->concepto;
        $concept->referencia = $request->referencia;
        $concept->save();
        return response()->json(['message' => 'Concepto actualizado con exito :D goku le gana', 'estado' => 'ok']);
    }

    public function delete($id)
    {
        try {
            $concept = Conceptos::findOrFail($id);
            $concept->delete();

            return response()->json(['message' => 'Concepto borrado exitosamente', 'estado' => 'ok'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el concepto', 'estado' => 'error'], 500);
        }
    }


}
