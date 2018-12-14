<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatus; 

class EstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $estatus = Estatus::latest()->paginate(15);
  
        return view('estatus.index',compact('estatus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
   
        return view('estatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Estatus::create($request->all());
        return redirect()->route('estatus.index')
                        ->with('success','Estatus created successfully');
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
 
        $estatus = Estatus::find($id);
        return view('estatus.edit');
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
        Estatus::find($id)->update($request->all());
        return redirect()->route('estatus.index')
                        ->with('success','Estatus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estatus::find($id)->delete();
        return redirect()->route('estatus.index')
                        ->with('success','Estatus deleted successfully');
    }
}
