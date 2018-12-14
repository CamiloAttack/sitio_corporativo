<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaMedia;
 
class CategoriaMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria_media = CategoriaMedia::latest()->paginate(5);
        return view('categoria_media.index',compact('categoria_media'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria_media.create');
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
            'nom_categoria_media' => 'required',
            'desc_categoria_media' => 'required',
        ]);
        CategoriaMedia::create($request->all());
        return redirect()->route('categoria_media.index')
                        ->with('success','categoria_media created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria_media = CategoriaMedia::find($id);
        return view('categoria_media.show',compact('categoria_media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria_media = CategoriaMedia::find($id);
        return view('categoria_media.edit',compact('categoria_media'));
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
            'nom_categoria_media' => 'required',
            'desc_categoria_media' => 'required',
        ]);
        CategoriaMedia::find($id)->update($request->all());
        return redirect()->route('categoria_media.index')
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
        CategoriaMedia::find($id)->delete();
        return redirect()->route('categoria_media.index')
                        ->with('success','categoria_media deleted successfully');
    }
}