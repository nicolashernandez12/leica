<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->paginate(5);
        return view('place.index', compact('places'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('place.create');
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
            'place_name' => 'required',
            'description' => 'required'
          ]);
  
          Place::create($request->all());
          return redirect()->route('place.index')
                          ->with('success', 'new place created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        return view('place.detail', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);
        return view('place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'place_name' => 'required',
            'description' => 'required'
          ]);
          $place = Place::find($id);
          $place->place_name = $request->get('place_name');
          $place->description = $request->get('description');
          $place->save();
          return redirect()->route('place.index')
                          ->with('success', 'place name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();
        return redirect()->route('place.index')
                        ->with('success', 'place deleted successfully');
    }
}
