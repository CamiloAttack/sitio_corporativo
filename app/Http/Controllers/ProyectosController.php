<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multimedia;
use App\CategoriaMedia;
use App\Puntaje;


class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        

       // $multimedia = Multimedia::limit(3)->offset($request->get('page'))->get();
        $array_paginacion=[];
        $incrementa =1;
        $multimedia_all = Multimedia::all();  


       /*  
        
     foreach ($multimedia_all as $k => $v) {

                    $carga_datos[$v->multimedia_id][]=$v->nom_multimedia;
                     $carga_datos[$v->multimedia_id][]=$v->total;   
                     $carga_datos[$v->multimedia_id][]=$v->multimedia;

    }
           print_r($carga_datos);
    exit();    
          foreach($multimedia_all as $key =>$value)
        {
            foreach ($value->puntaje as $k => $v) {

          //      $carga_datos[$value->id][]=$v->puntaje;
                # code...
            }
         }
         */
        foreach($multimedia_all as $key =>$value)
        {
            if($key %6==0)
            $array_paginacion[$incrementa++]=$key;
        }
   
        $length_paginacion = count($array_paginacion);
        //echo  $length_paginacion;

        if( $request->get('page') !== null and $request->get('page') !== 0 ){

 
                $multimedia=Multimedia::leftjoin('puntaje','multimedia.id','=','puntaje.multimedia_id')
                ->selectRaw('SUM(puntaje.puntaje) as total')
                ->selectRaw('COUNT(puntaje.multimedia_id) as cantidad')
                ->selectRaw('nom_multimedia')
                ->selectRaw('multimedia.id')
                ->selectRaw('multimedia')
                ->selectRaw('multimedia_id')
                ->selectRaw('desc_multimedia') 
                ->selectRaw('categoria_media_id')  
                ->selectRaw('tipo_media_id')
                ->selectRaw('multimedia.created_at')  
                ->selectRaw('multimedia.updated_at')                                          
                ->groupBy('nom_multimedia','multimedia_id','multimedia','desc_multimedia','desc_multimedia','categoria_media_id','tipo_media_id','created_at','updated_at','multimedia.id')->limit(6)->offset($array_paginacion[$request->get('page')])->orderBy('multimedia.id', 'asc')->get();


                return $multimedia;
           // echo $request->get('page');
            if($request->get('page') < 1){

              //?????  return $multimedia = Multimedia::limit(0)->offset(0)->get();

            }else{

                //?????  $multimedia = Multimedia::limit(6)->offset( $array_paginacion[$request->get('page')])->get();
                //?????  return $multimedia;

            }


        }else{

 
        $multimedia=Multimedia::leftjoin('puntaje','multimedia.id','=','puntaje.multimedia_id')
        ->selectRaw('SUM(puntaje.puntaje) as total')
        ->selectRaw('COUNT(puntaje.multimedia_id) as cantidad')
        ->selectRaw('nom_multimedia')
        ->selectRaw('multimedia.id')
        ->selectRaw('multimedia')
        ->selectRaw('multimedia_id')
        ->selectRaw('desc_multimedia') 
        ->selectRaw('categoria_media_id')  
        ->selectRaw('tipo_media_id')
        ->selectRaw('multimedia.created_at')  
        ->selectRaw('multimedia.updated_at')                                          
        ->groupBy('nom_multimedia','multimedia_id','multimedia','desc_multimedia','desc_multimedia','categoria_media_id','tipo_media_id','created_at','updated_at','multimedia.id')->limit(6)->offset(0)->orderBy('multimedia.id', 'asc')->get();

     // $multimedia = Multimedia::limit(6)->offset(0)->get();
 
        }
     
        if( $request->get('puntaje') ){//consulta ajax votos

            Puntaje::create([
                'puntaje' =>$request->get('puntaje'),            
                'multimedia_id' => $request->get('multimedia_id')
               
            ]);
      
        }

        $categoriamedia = CategoriaMedia::all();  
 
        return view('sitio.proyectos',compact('multimedia','categoriamedia','length_paginacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
