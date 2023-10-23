<?php

namespace App\Http\Controllers;

use App\Models\perros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PController extends Controller
{
    public function index()
    {
        $perros = perros::all(); // 

        return view('p', ['perros' => $perros]);
    }

    public function create(Request $request)
    {
        try {
            $registro = new perros();
            $registro->nombre = $request->input('nombre');
            $registro->fecha_nacimiento = $request->input('fecha_Nac');
            $registro->sexo = $request->input('sexo');
            $registro->raza = $request->input('raza');
            $registro->descripcion = $request->input('descripcion');
            $registro->save();

            return redirect()->route('p');

            return redirect()->route('p')->with("correcto", "Perro registrado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar el perro");
        }
    }


    public function update(Request $request, $id)
    {
       try {
         // Buscar el perro por su ID
        $perro = perros::find($id);

        // Verificar si el perro existe
        if (!$perro) {
            return back()->with("error", "Perro no encontrado");
        }

        // Actualizar los campos del perro con los datos del formulario
        $perro->nombre = $request->input('nombre');
        $perro->fecha_nacimiento = $request->input('fecha_Nac');
        $perro->sexo = $request->input('sexo');
        $perro->raza = $request->input('raza');
        $perro->descripcion = $request->input('descripcion');

        // Guardar los cambios en la base de datos
        $perro->save();

        return redirect()->route('p.index')->with("correcto", "Perro modificado correctamente");
       } catch (\Throwable $th) {
        return back()->with("error", "Error al registrar el perro");
       }

       
    }

    public function delete($id)
    {
        try {
            // Encuentra el registro que deseas eliminar por su ID
            $registro = perros::find($id);

            // Verifica si el registro existe
            if (!$registro) {
                return back()->with("error", "Registro no encontrado");
            }

            // Elimina el registro de la base de datos
            $registro->delete();

            return redirect()->route('p')->with("correcto", "Registro eliminado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el registro");
        }
    }
}
