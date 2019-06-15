<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Trademark;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('model.index')->with('models',Modelo::with('trademark')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trademarks = Trademark::all();
        return view('model.create', compact('trademarks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required',
            'id_trademark' => 'required',
            'description' => 'required',
          ]);
  
          Modelo::create($request->all());
          return redirect()->route('model.index')
                          ->with('success', 'modelo agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Modelo::find($id);
        return view('model.detail', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Modelo::find($id);
        $trademarks = Trademark::all();
        return view('model.edit')->with('model',$model)->with('trademarks',$trademarks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'model_name' => 'required',
            'id_trademark' => 'required',
            'description' => 'required'
          ]);
          $model = Modelo::find($id);
          $model->model_name = $request->get('model_name');
          $model->id_trademark = $request->get('id_trademark');
          $model->description = $request->get('description');
          $model->save();
          return redirect()->route('model.index')
                          ->with('success', 'modelo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Modelo::find($id);
        $model->delete();
        return redirect()->route('model.index')
                        ->with('success', 'modelo eliminado exitosamente');
    }
}
