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
        $place_softwares = Place::all();
        //$place_softwares = PlaceSoftware::with('place')->distinct('place_name')->get();

        //$place_softwares = PlaceSoftware::with('place')->distinct('place_name')->get();
        return view('place_software.index',compact('place_softwares'));
        // return view('place_software.index')->with('place_softwares',PlaceSoftware::with('place')->get());
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
            // 'id_software' => 'required'
          ]);
        
        //$place_software = new PlaceSoftware();
        // $place_software->id_place = $request->get('id_place');
        // $place_software->id_software = $request->get('id_software');
        //$place_software->save();
        
        // $place_software_id = $place_software->id;
        $place_id=$request->get('id_place');

        if ($request->has('softwares')) {
            $softwares = $request->get('softwares');
            foreach ($softwares as $software) {
                $new_assign_software = new PlaceSoftware();
                $new_assign_software->id_software = $software;
                $new_assign_software->id_place= $place_id;
                $new_assign_software->save();
            }

        }

  
          //PlaceSoftware::create($request->all());
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
        $place = Place::find($id);
        // $id=$place->place->id;
        $place_softwares = PlaceSoftware::where('id_place',$id)->distinct('id_sofware')->get();
        

        return view('place_software.detail', compact('place','place_softwares'));

        // $place_software = PlaceSoftware::find($id);
        // return view('place_software.detail', compact('place_software'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlaceSoftware  $placeSoftware
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);

        $softwares = Software::all();

        $software_ids = [];

        foreach ($place->placeSoftware as $software) {
            array_push($software_ids, $software->id_software);
        }

        return view('place_software.edit',compact('place','softwares', 'software_ids'));
        
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
        $place = Place::find($id);

        if ($request->has('softwares')) {
            $softwares = $request->get('softwares');
            foreach ($place->placeSoftware as $software) {
                $software->delete();
            }
            foreach($softwares as $software){
                $new_assign_software = new PlaceSoftware();
                $new_assign_software->id_software = $software;
                $new_assign_software->id_place = $id;
                $new_assign_software->save();
            }
            
        }

        return redirect()->route('place_software.index')
                ->with('success', 'software por lugar actualizado exitosamente');
        
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
