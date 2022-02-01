<?php

namespace App\Http\Controllers;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $result =Imagen::all();
          return response()->json([$result], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Obtener todos los datos que me llegan .
        //Construir un objeto del modelo 
        //Guardar el objeto en la base de datos 
        //devolver como resultado el id autonumerico del objeto  que se ha guardado
        //Si cosa falla ->  http/s 200 , o resultado 
        $result=0;
        try{
            $imagen = new Imagen($request->all());//Rella el objeto con el request 
            $imagen->save();
            $result =['id'=>$imagen->id] ;
            $id = $imagen ->id;
            
        }catch(\Exception $e){
            dd($e);
           // $result = ['id' => 0, 'error' => $e->getMessage()]; 
            $result = ['id' => 0]; 
            $id= 0;
        //echo $e->getMessage();
              
            
        }
          return response()->json([$result], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         //
            $result  =Imagen::find($id);
         if($result == null){
           $result = [];
            
         }
         return response()->json([$result], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
          $result = 0;
        $objeto = Imagen::find($id);
        if($objeto !=null){
          $result =   $objeto ->update($request -> all()); 
          if($result){
              $result = 1;
          }
        }
                //return response()->json(['rows' => $result,'imagen' => $objeto], 200);
                return response()->json(['rows' => $result], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $result= Imagen::destroy($id);

         return response()->json(['rows' => $result], 200);
        //
        //
    }
}
