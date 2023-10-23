<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerroController extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM perros");
        return view("perro")->with("datos", $datos);
    }

    public function create(Request $request){
        try{
             $sql = DB::insert("INSERT INTO perros(nombre, fecha_nacimiento, sexo, raza, descripcion) VALUES (?, ?, ?, ?, ?)", [
            $request->nombre,
            $request->input('fecha_Nac'),
            $request->sexo,
            $request->raza,
            $request->input('descripcion')
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Producto registrado correctamente");
       }else{
        return back()->with("error","Error al registrar");
       }

    }

    public function update(Request $request){
        try{
            $sql=DB::update(" UPDATE perros SET nombre=?, fecha_nacimiento=?, sexo=?, raza=?, descripcion=? where idperros=?",[
            $request->nombre,
            $request->input('fecha_Nac'),
            $request->sexo,
            $request->raza,
            $request->input('descripcion'),
            $request->id
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Producto modificado correctamente");
       }else{
        return back()->with("error","Error al modificar");
       }

    }

    public function delete($id){
        try{
            $sql = DB::delete("DELETE FROM perros WHERE idperros=$id");
       }catch(\Throwable $th){
          $sql=0;
       }
      
       
      if($sql==true){
           return back()->with("correcto","Producto eliminado correctamente");
      }else{
       return back()->with("error","Error al eliminar");
      }
    }
}
