<?php

namespace App\Http\Controllers;

use App\AudNormatividad;
use Illuminate\Http\Request;

class AudNormatividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $normativa=AudNormatividad::all()->sortBy('descripcion');
        return view('auditorias.normatividad',compact('normativa','normativa'));
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
        $this->validate($request,[
            'descripcion' => 'required',
        ]);
        $norma= array(
            'descripcion' => $request->get('descripcion'),'utf-8'
        );
        AudNormatividad::create($norma);
        return back();
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
        $this->validate($request,[
            'descripcion_modi' => 'required',
        ]);
        $norma= array(
            'descripcion' => $request->get('descripcion_modi'),'utf-8'
        );
        AudNormatividad::find($id)->update($norma);
        return back();
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
        AudNormatividad::destroy($id);
        return back();
    }
}
