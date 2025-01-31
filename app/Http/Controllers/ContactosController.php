<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactosController extends Controller
{
    public function create(Request $request){
        $contacto = new Contacto();
        $datos = [
            'nombre' => $request->nombre,
            'apellidoP' => $request->apellidoPaterno,
            'apellidoM' => $request->apellidoMaterno,
            'correo' => $request->correo,
            'estado' => $request->estado,
            'direccion' => $request->direccion,
            'notas' => $request->notas,
            'lada' => $request->lada,
            'telefono' => $request->telefono,
            'etiquetas' => $request->etiquetas,
            'origen' => $request->origen,
            'origen2' => $request->origen2,
            'fechaNacimiento' => $request->fechaNacimiento,
            'asignar' => $request->asignar
        ];
        
        $campos_faltantes = [];

        foreach ($datos as $campo => $valor) {
            if (empty($valor)) {
                $campos_faltantes[] = "El campo '$campo' es obligatorio.";
            } else {
                $contacto->$campo = $valor;
            }
        }

        if (!empty($campos_faltantes)) {
            return response()->json([
                'error' => true,
                'message' => $campos_faltantes
            ], 400);
        }

        $contacto->save();
        return response()->json([
            "status" => "Creado",
            "data" => $contacto
        ], 201);
    }

    public function getAll(){
        $contacto = Contacto::all();
        return response()->json([
            'status'=> 'creado',
            'data'=> $contacto
        ], 200);
    }
}
