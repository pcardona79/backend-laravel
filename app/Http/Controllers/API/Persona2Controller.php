<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Persona2Controller extends Controller
{
    //


    //Get  LIstar
    public function get(){

        try {
        
            $data = Persona::get();
            return response()->json($data,200);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th ->getMessage()],500);
        }

    }


    // create // crear la  persona
    public function create(Request $request)
    {
        try {
            //code...
            $data['nombre']=$request['nombre'];
            $data['direccion']=$request['direccion'];
            $data['telefono']=$request['telefono'];
            $res=Persona::create($data);
            return response()->json($res,200);
    
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th ->getMessage(),500]);
        }

    }
  

    public function getById($id)

    {
            try {              
                   $data=Persona::find($id);
                   return response()->json($data,200);

            } catch (\Throwable $th) {
                return response()->json(['error' => $th ->getMessage(),500]);
            }

    }


   public  function update(Request $request ,$id)
   {

        try {
            $data['nombre']=$request['nombre'];
            $data['direccion']=$request['direccion'];
            $data['telefono']=$request['telefono'];

            Persona::find($id)->update($data); 
            $res=Persona::find($id);
            return response()->json($res,200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th ->getMessage(),500]);
        }

   }


   public function delete($id)
   {


       try {
             $res=Persona::find($id)->delete();
             return response()->json(['Registro eliminado' => $res ] ,200);
       } catch (\Throwable $th) {
        return response()->json(['error' => $th ->getMessage(),500]);
       }

   }



}