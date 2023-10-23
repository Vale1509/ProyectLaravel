<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdoptanteController extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM adoptantes");
        return view("adoptante")->with("datos", $datos);
    }

    public function create(Request $request){
        try{
             $sql = DB::insert("INSERT INTO adoptantes(nombre, dui, telefono, correo) VALUES (?, ?, ?, ?)", [
            $request->nombre,
            $request->dui,
            $request->telefono,
            $request->correo
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Adoptante registrado correctamente");
       }else{
        return back()->with("error","Error al registrar");
       }

    }

    public function update(Request $request){
        try{
            $sql=DB::update(" UPDATE adoptantes SET nombre=?, dui=?, telefono=?, correo=? where idadoptantes=?",[
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
            return back()->with("correcto","Adoptantes modificado correctamente");
       }else{
        return back()->with("error","Error al modificar");
       }

    }

    public function delete($id){
        try{
            $sql = DB::delete("DELETE FROM adoptantes WHERE idadoptantes=$id");
       }catch(\Throwable $th){
          $sql=0;
       }
      
       
      if($sql==true){
           return back()->with("correcto","Adoptante eliminado correctamente");
      }else{
       return back()->with("error","Error al eliminar");
      }
    }
}
