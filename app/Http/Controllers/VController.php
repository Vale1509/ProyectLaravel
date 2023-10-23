<?php

namespace App\Http\Controllers;

use App\Models\voluntarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VController extends Controller
{
    public function index(){
        $voluntarios = voluntarios::all(); // 

        return view('v', ['voluntarios' => $voluntarios]);
    }

    public function create(Request $request){
        try{

            $registro = new voluntarios();
            $registro->nombre = $request->input('nombre');
            $registro->dui = $request->input('dui');
            $registro->telefono = $request->input('telefono');
            $registro->correo= $request->input('correo');
            $registro->save();
    
        return redirect()->route('v');
         
            return redirect()->route('v')->with("correcto", "Voluntario registrado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar al voluntario");
        }
     

    }

    public function update(Request $request,$id){
        try {
            $voluntario = voluntarios::find($id);

        
        if (!$voluntario) {
            return back()->with("error", "Voluntario no encontrado");
        }

        $voluntario->nombre = $request->input('nombre');
        $voluntario->dui = $request->input('dui');
        $voluntario->telefono = $request->input('telefono');
        $voluntario->correo = $request->input('correo');

        // Guardar los cambios en la base de datos
        $voluntario->save();

        return redirect()->route('v.index')->with("correcto", "Voluntario modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar al voluntario");
        }
        

    }

    public function delete($id){
        try {
            // Encuentra el registro que deseas eliminar por su ID
            $registro = voluntarios::find($id);
    
            // Verifica si el registro existe
            if (!$registro) {
                return back()->with("error", "Registro no encontrado");
            }
    
            // Elimina el registro de la base de datos
            $registro->delete();
    
            return redirect()->route('v')->with("correcto", "Registro eliminado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el registro");
        }
    }
}
