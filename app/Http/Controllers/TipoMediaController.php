<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMedia;

class TipoMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_media = TipoMedia::latest()->paginate(5);
        return view('tipo_media.index',compact('tipo_media'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_media.create');
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
            'nom_tipo_media' => 'required',
            'desc_tipo_media' => 'required',
        ]);
        TipoMedia::create($request->all());
        return redirect()->route('tipo_media.index')
                        ->with('success','tipo_media created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_media = TipoMedia::find($id);
        return view('tipo_media.show',compact('tipo_media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_media = TipoMedia::find($id);
        return view('tipo_media.edit',compact('tipo_media'));
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
            'nom_tipo_media' => 'required',
            'desc_tipo_media' => 'required',
        ]);
        TipoMedia::find($id)->update($request->all());
        return redirect()->route('tipo_media.index')
                        ->with('success','tipo_media updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoMedia::find($id)->delete();
        return redirect()->route('tipo_media.index')
                        ->with('success','tipo_media deleted successfully');
    }
}