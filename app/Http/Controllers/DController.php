<?php

namespace App\Http\Controllers;

use App\Models\donaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DController extends Controller
{
    public function index(){
        $donaciones = donaciones::all(); // 

        return view('d', ['donaciones' => $donaciones]);
    }

    public function create(Request $request){
        try{

            $registro = new donaciones();
            $registro->nombre = $request->input('nombre');
            $registro->fecha = $request->input('fecha');
            $registro->monto = $request->input('monto');
            $registro->metodo_donacion= $request->input('metodo');
            $registro->save();
    
        return redirect()->route('d');
         
            return redirect()->route('d')->with("correcto", "Donacion registrada correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar la donacion");
        }
       

    }

    public function update(Request $request,$id){
        
        try {
          $donacion = donaciones::find($id);

        if (!$donacion) {
            return back()->with("error", "Donacion no encontrado");
        }

        $donacion->nombre = $request->input('nombre');
        $donacion->fecha = $request->input('fecha');
        $donacion->monto = $request->input('monto');
        $donacion->metodo_donacion = $request->input('metodo');

        // Guardar los cambios en la base de datos
        $donacion->save();

        return redirect()->route('d.index')->with("correcto", "Donacion modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar la donacion");
        }
       

    }

    public function delete($id){
        try {
            // Encuentra el registro que deseas eliminar por su ID
            $registro = donaciones::find($id);
    
            // Verifica si el registro existe
            if (!$registro) {
                return back()->with("error", "Registro no encontrado");
            }
    
            // Elimina el registro de la base de datos
            $registro->delete();
    
            return redirect()->route('d')->with("correcto", "Registro eliminado correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el registro");
        }
    }
}
