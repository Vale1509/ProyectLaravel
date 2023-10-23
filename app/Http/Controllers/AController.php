<?php

namespace App\Http\Controllers;

use App\Models\adoptantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AController extends Controller
{
    public function index(){
        $adoptantes = adoptantes::all(); // 

        return view('a', ['adoptantes' => $adoptantes]);
    }

    public function create(Request $request){
        try{

            $registro = new adoptantes();
            $registro->nombre = $request->input('nombre');
            $registro->dui = $request->input('dui');
            $registro->telefono = $request->input('telefono');
            $registro->correo= $request->input('correo');
            $registro->save();
    
        return redirect()->route('a');
         
            return redirect()->route('a')->with("correcto", "Adoptante registrado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar al adoptante");
        }
         

    }

    public function update(Request $request,$id){
        try {
            $adoptante = adoptantes::find($id);

        if (!$adoptante) {
            return back()->with("error", "Adoptante no encontrado");
        }

        $adoptante->nombre = $request->input('nombre');
        $adoptante->dui = $request->input('dui');
        $adoptante->telefono = $request->input('telefono');
        $adoptante->correo = $request->input('correo');

        // Guardar los cambios en la base de datos
        $adoptante->save();

        return redirect()->route('a.index')->with("correcto", "Adoptante modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar al adoptante");
        }
        
       

    }

    public function delete($id){
        try {
            // Encuentra el registro que deseas eliminar por su ID
            $registro = adoptantes::find($id);
    
            // Verifica si el registro existe
            if (!$registro) {
                return back()->with("error", "Registro no encontrado");
            }
    
            // Elimina el registro de la base de datos
            $registro->delete();
    
            return redirect()->route('a')->with("correcto", "Registro eliminado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el registro");
        }
    }
}
