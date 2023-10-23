<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonacionController extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM donaciones");
        return view("donacion")->with("datos", $datos);
    }

    public function create(Request $request){
        try{
             $sql = DB::insert("INSERT INTO donaciones(nombre,fecha,monto,metodo_donacion) VALUES (?, ?, ?, ?)", [
            $request->nombre,
            $request->fecha,
            $request->monto,
            $request->metodo
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Donacion registrada correctamente");
       }else{
        return back()->with("error","Error al registrar");
       }

    }

    public function update(Request $request){
        try{
            $sql=DB::update(" UPDATE donaciones SET nombre=?, fecha=?, monto=?, metodo_donacion=? where iddonaciones=?",[
            $request->nombre,
            $request->fecha,
            $request->monto,
            $request->metodo,
            $request->id
        ]);
        }catch(\Throwable $th){
           $sql=0;
        }
       
        
       if($sql==true){
            return back()->with("correcto","Donacion modificada correctamente");
       }else{
        return back()->with("error","Error al modificar");
       }

    }

    public function delete($id){
        try{
            $sql = DB::delete("DELETE FROM donaciones WHERE iddonaciones=$id");
       }catch(\Throwable $th){
          $sql=0;
       }
      
       
      if($sql==true){
           return back()->with("correcto","Donacion eliminada correctamente");
      }else{
       return back()->with("error","Error al eliminar");
      }
    }
}
