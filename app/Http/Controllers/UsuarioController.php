<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;
use App\Estatus; 

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = Usuario::latest()->paginate(15);
//dd($usuarios); 
        return view('usuario.index',compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
 
        $select_rol= Rol::all()->pluck('nombre', 'id');
        $select_estatus  = Estatus::all()->pluck('nombre', 'id');


 
        return view('usuario.create',compact('select_rol','select_estatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  Usuario::create($request->all());



          $Usuario = new Usuario(); //instancio clase usuarios

          $Usuario->password = bcrypt($request->get('password'));
 
          $Usuario->estatus_id = $request->get('estatus_id');
 
          $Usuario->rol_id = $request->get('rol_id');          
          $Usuario->nombre = $request->get('nombre');
          $Usuario->ape_pater = $request->get('ape_pater');
          $Usuario->ape_mater = $request->get('ape_mater');
          $Usuario->telefono = $request->get('telefono');
          $Usuario->email = $request->get('email');
          $Usuario->rut = $request->get('rut');



        $Usuario->save();
      
        return redirect()->route('usuario.index')
                        ->with('success','Usuario created successfully');
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
        $select_rol= Rol::all()->pluck('nombre', 'id');
        $select_estatus  = Estatus::all()->pluck('nombre', 'id');
      

        $usuario = Usuario::find($id);
        return view('usuario.edit',compact('usuario','select_estatus','select_rol'));
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
      /*  request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);*/

        $array_update = [];
 

        foreach ($request->all() as $key => $value) {

            if($key == "password"){
 
               $array_update[ "password"] = bcrypt($request->get('password')); 

            }else{

                $array_update[$key] = $value; 

            }
           

        }
 
        Usuario::find($id)->update($array_update);
        return redirect()->route('usuario.index')
                        ->with('success','Usuario updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::find($id)->delete();
        return redirect()->route('usuario.index')
                        ->with('success','Usuario deleted successfully');
    }
}
