<?php

namespace App\Http\Controllers;

use App\Liable;
use App\Position;
use Illuminate\Http\Request;

class LiableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('liable.index')->with('liables',Liable::with('position')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('liable.create', compact('positions'));
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
            'name_person' => 'required',
            'last_name_person' => 'required',
            'rut' => 'required',
            'id_position' => 'required',
          ]);
  
          Liable::create($request->all());
          return redirect()->route('liable.index')
                          ->with('success', 'new liable added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liable = Liable::find($id);
        return view('liable.detail', compact('liable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liable = Liable::find($id);
        $positions = Position::all();
        return view('liable.edit')->with('liable',$liable)->with('positions',$positions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name_person' => 'required',
            'last_name_person' => 'required',
            'rut' => 'required',
            'id_position' => 'required'
          ]);
          $liable = Liable::find($id);
          $liable->name_person = $request->get('name_person');
          $liable->last_name_person = $request->get('last_name_person');
          $liable->rut = $request->get('rut');
          $liable->id_position = $request->get('id_position');
          $liable->save();
          return redirect()->route('liable.index')
                          ->with('success', 'liable name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liable = Liable::find($id);
        $liable->delete();
        return redirect()->route('liable.index')
                        ->with('success', 'liable deleted successfully');
    }
}
