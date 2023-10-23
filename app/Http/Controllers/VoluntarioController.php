<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoluntarioController extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM voluntarios");
        return view("voluntario")->with("datos", $datos);
    }

    public function create(Request $request){
        try{
             $sql = DB::insert("INSERT INTO voluntarios(nombre, dui, telefono, correo) VALUES (?, ?, ?,?)", [
            $request->nombre,
            $request->dui,
            $request->telefono,
            $request->correo
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Voluntario registrado correctamente");
       }else{
        return back()->with("error","Error al registrar");
       }

    }

    public function update(Request $request){
        try{
            $sql=DB::update(" UPDATE voluntarios SET nombre=?, dui=?, telefono=?, correo=? where idvoluntarios=?",[
            $request->nombre,
            $request->dui,
            $request->telefono,
            $request->correo,
            $request->id
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Voluntario modificado correctamente");
       }else{
        return back()->with("error","Error al modificar");
       }

    }

    public function delete($id){
        try{
            $sql = DB::delete("DELETE FROM voluntarios WHERE idvoluntarios=$id");
       }catch(\Throwable $th){
          $sql=0;
       }
      
       
      if($sql==true){
           return back()->with("correcto","Voluntario eliminado correctamente");
      }else{
       return back()->with("error","Error al eliminar");
      }
    }
}
