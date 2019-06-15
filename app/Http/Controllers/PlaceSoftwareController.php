<?php

namespace App\Http\Controllers;

use App\PlaceSoftware;
use App\Software;
use App\Place;
use Illuminate\Http\Request;

class PlaceSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('place_software.index')->with('place_softwares',PlaceSoftware::with('place')->get(),
                                                                    PlaceSoftware::with('software')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all();
        $softwares = Software::all();
        return view('place_software.create', compact('places','softwares'));
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
            'id_place' => 'required',
            'id_software' => 'required'
          ]);
  
          PlaceSoftware::create($request->all());
          return redirect()->route('place_software.index')
                          ->with('success', 'lugar software agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlaceSoftware  $placeSoftware
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place_software = PlaceSoftware::find($id);
        return view('place_software.detail', compact('place_software'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlaceSoftware  $placeSoftware
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place_software = PlaceSoftware::find($id);
        $places = Place::all();
        $softwares = Software::all();
        return view('place_software.edit')->with('place_software',$place_software)->with('places',$places)
                                                                                  ->with('softwares',$softwares);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlaceSoftware  $placeSoftware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_place' => 'required',
            'id_software' => 'required',
          ]);
          $place_software = PlaceSoftware::find($id);
          $place_software->id_place = $request->get('id_place');
          $place_software->id_software = $request->get('id_software');
          $place_software->save();
          return redirect()->route('place_software.index')
                          ->with('success', 'software lugar actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlaceSoftware  $placeSoftware
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place_software = PlaceSoftware::find($id);
        $place_software->delete();
        return redirect()->route('place_software.index')
                        ->with('success', 'software lugar eliminado exitosamente');
    }
}
