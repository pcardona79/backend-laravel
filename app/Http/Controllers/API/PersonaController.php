<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class PersonaController extends Controller
{
    //


    public function get(){
        // try { 
            // $data = Persona::get();
            // return response()->json($data, 200);
            return redirect()->away('https://www.google.com');
        // } catch (\Throwable $th) {
        //     return response()->json([ 'error' => $th->getMessage()], 500);
        // }
    }

    public function create(Request $request){
        try {
             $data['nombre']=$request['nombre'];
             $data['direccion']=$request['direccion'];
             $data['telefono']=$request['telefono'];
             $res= Persona::create($data);
             return response()->json($res,200);       

        } catch (\Throwable $th) {
            return response()->json(['error' =>  $th->getMessage(),500]);           
        }

    }

 
    public function getById($id)
    {
        try {
                $data=Persona::find($id);
                return response()->json($data,200);
            } catch (\Throwable $th) {
            return response()->json(['error' =>  $th->getMessage(),500]);         
        }
    }


    public function update(Request $request,$id){
        try {
            $data['nombre']=$request['nombre'];
            $data['direccion']=$request['direccion'];
            $data['telefono']=$request['telefono'];
            Persona::find($id)->update($data);
            $res=Persona::find($id);
            return response()->json($res,200);       


        } catch (\Throwable $th) {
            return response()->json(['error' =>  $th->getMessage(),500]);           
        }

    }

    public function delete($id)
    {
        try {
            $res=Persona::find($id)->delete();
            return response()->json(['Eliminada' =>  $res,200]);       
        } catch (\Throwable $th) {
            return response()->json(['error' =>  $th->getMessage(),500]);       

         }
    }
}
