<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol; 

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rol = Rol::latest()->paginate(15);
  
        return view('rol.index',compact('rol'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
   
        return view('rol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Rol::create($request->all());
        return redirect()->route('rol.index')
                        ->with('success','Rol created successfully');
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
 
        $rol = Rol::find($id);
        return view('rol.edit',compact('rol'));
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
        Rol::find($id)->update($request->all());
        return redirect()->route('rol.index')
                        ->with('success','Rol updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rol::find($id)->delete();
        return redirect()->route('rol.index')
                        ->with('success','Rol deleted successfully');
    }
}
