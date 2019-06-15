<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::latest()->paginate(5);
        return view('position.index', compact('positions'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
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
            'position_name' => 'required',
            'description' => 'required'
          ]);
  
          Position::create($request->all());
          return redirect()->route('position.index')
                          ->with('success', 'puesto agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        return view('position.detail', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'position_name' => 'required',
            'description' => 'required'
          ]);
          $position = Position::find($id);
          $position->position_name = $request->get('position_name');
          $position->description = $request->get('description');
          $position->save();
          return redirect()->route('position.index')
                          ->with('success', 'puesto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();
        return redirect()->route('position.index')
                        ->with('success', 'puesto eliminado exitosamente');
    }
}
