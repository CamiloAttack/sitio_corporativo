<?php

namespace App\Http\Controllers;
use App\Usuario;
use Session;
use Illuminate\Http\Request;
use App\Multimedia;
use App\TipoMedia;
use App\CategoriaMedia; 
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Image;


class MultimediaController extends Controller
{
   
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

 
        $multimedia = Multimedia::all();
        //$multimedia = Multimedia::with("tipomedia")->with("categoriamedia")->get();
        //dd($multimedia);
        return view('multimedia.index',compact('multimedia'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
 
        $TipoMedia= TipoMedia::all()->pluck('nom_tipo_media', 'id');
        $CategoriaMedia  = CategoriaMedia::all()->pluck('nom_categoria_media', 'id');

        $select_form_categoria_media = [];

        foreach ($CategoriaMedia  as $key => $value) {
 
            $select_form_categoria_media['0'] = 'seleccione';            
            $select_form_categoria_media[$key] = $value;

        }

        $select_form_tipo_media = [];
        
        foreach ($TipoMedia  as $key => $value) {
 
            $select_form_tipo_media['0'] = 'seleccione';            
            $select_form_tipo_media[$key] = $value;

        }
 
        return view('multimedia.create',compact('select_form_tipo_media','select_form_categoria_media'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'nom_multimedia' => 'required',
            'desc_multimedia' => 'required',
        ]);
 


        switch ($request->get('tipo_media_id')) {
            case 1: 

               // request()->multimedia =request()->multimedia_img;               
               // $nombre_archivo = time().'.'.request()->multimedia->getClientOriginalExtension();
      

                $image = $request->file('multimedia_img');
                $nombre_archivo = $request->get('nom_multimedia').substr(str_replace("0.","",microtime()),0,4).'.'.$image->getClientOriginalExtesion();
             
           
                $destinationPath = public_path('/archivos_media/images');
                $img = Image::make($image->getRealPath());
                $img->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$nombre_archivo);


                $destinationPath = public_path('/archivos_media/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$nombre_archivo);








               // request()->multimedia->move(public_path('archivos_media'), $nombre_archivo);     
                break;


            case 3:
                
                request()->multimedia =request()->multimedia_video;                            
                $time = time(); 
                $nombre_archivo = $time.'.'.request()->multimedia->getClientOriginalExtension();
                request()->multimedia->move(public_path('archivos_media/videos'), $nombre_archivo); 
                $ruta = public_path('archivos_media/videos/');
                $ruta_thumbnail = public_path('archivos_media/thumbnail/');             
                $frame = exec('ffmpeg -i '.$ruta_thumbnail.$nombre_archivo.' '. $ruta_thumbnail.$time.'.jpg');//capturo el frame del video
 
                break;

            case 2:
                request()->multimedia=request()->multimedia_youtube;
                $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
                $array = preg_match($patron, request()->multimedia, $parte);
                if (false !== $array) {
                    $nombre_archivo = $parte[1];

                    $imagen = file_get_contents("http://img.youtube.com/vi/".$nombre_archivo."/default.jpg");
                    file_put_contents("archivos_media/thumbnail/".$nombre_archivo.".jpg", $imagen);

                }
                break; 

            default:
                # code...
                break;
        }
      

        MultiMedia::create([
 
            'nom_multimedia' => $request->get('nom_multimedia'), 
            'desc_multimedia' => $request->get('desc_multimedia'),
            'tipo_media_id' => $request->get('tipo_media_id'),
            'categoria_media_id' => $request->get('categoria_media_id'),
            'multimedia' => $nombre_archivo, 

            ]);
   
        return redirect()->route('multimedia.index')
                        ->with('success','multimedia created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multimedia = CategoriaMedia::find($id);
        return view('multimedia.show',compact('multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $select_form_tipo_media = TipoMedia::all()->pluck('nom_tipo_media', 'id');

        $select_form_categoria_media  = CategoriaMedia::all()->pluck('nom_categoria_media', 'id');        

        $multimedia = Multimedia::find($id);
        return view('multimedia.edit',compact('multimedia','select_form_tipo_media','select_form_categoria_media'));
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
        request()->validate([
            'nom_multimedia' => 'required',
            'desc_multimedia' => 'required',
        ]);




        switch ($request->get('tipo_media_id')) {
            case 1: 
                if(request()->multimedia_img){

                $image = $request->file('multimedia_img');
                $nombre_archivo = str_replace(" ","_",$request->get('nom_multimedia')).substr(str_replace("0.","",microtime()),0,4).'.'.$image->getClientOriginalExtension();
                        
           
                $destinationPath = public_path('/archivos_media/images');
                $img = Image::make($image->getRealPath());

                if($img->width() > $img->height()){

                     $img->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$nombre_archivo);

                }else{

                     $img->resize(null,700, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$nombre_archivo);

                }


                $destinationPath = public_path('/archivos_media/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$nombre_archivo);

                }else{


                    $nombre_archivo = request()->multimedia;



                }
                  
                break;
 

            case 3:                
                if(request()->multimedia_video){

                request()->multimedia =request()->multimedia_video;                  
                $time = time(); 
                $nombre_archivo = $time.'.'.request()->multimedia->getClientOriginalExtension();
                request()->multimedia->move(public_path('archivos_media/videos'), $nombre_archivo); 
                $ruta = public_path('archivos_media/videos/');        
                
                $frame = exec('ffmpeg -i '.$ruta.$nombre_archivo.' '. $ruta.$time.'.jpg');//capturo el frame del video

          
                }else{


                    $nombre_archivo = request()->multimedia;



                } 
                break;
            case 2:
                if(request()->multimedia_youtube){
//dd(request()->multimedia_youtube);
                    request()->multimedia=request()->multimedia_youtube;
                    $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
                    $array = preg_match($patron, request()->multimedia, $parte);
                    if (false !== $array) {

                        $nombre_archivo = $parte[1];

                        $imagen = file_get_contents("http://img.youtube.com/vi/".$nombre_archivo."/default.jpg");
                        file_put_contents("archivos_media/thumbnail/".$nombre_archivo.".jpg", $imagen);


                    }

                }else{

                    $nombre_archivo = request()->multimedia;

                }


                break;            
            default:
                # code...
                break;
        }
//dd($request->get('nom_multimedia'));
        MultiMedia::where('id',$id)->update([
            'nom_multimedia' => $request->get('nom_multimedia'), 
            'desc_multimedia' => $request->get('desc_multimedia'),
            'tipo_media_id' => $request->get('tipo_media_id'),
            'categoria_media_id' => $request->get('categoria_media_id'),
            'multimedia' => $nombre_archivo, 
        ]);


        return redirect()->route('multimedia.index')
                        ->with('success','categoria_media updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        MultiMedia::find($id)->delete();
        return redirect()->route('multimedia.index')
                        ->with('success','categoria_media deleted successfully');
    }

    public function paginaMultimedia(){
      return Multimedia::all();  
    }




}