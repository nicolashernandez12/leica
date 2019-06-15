<?php

namespace App\Http\Controllers;

use App\Software;
use App\SoftwareType;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('software.index')->with('softwares',
        Software::with('softwareType')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $software_types = SoftwareType::all();
        return view('software.create', compact('software_types'));
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
            'name_software' => 'required',
            'version' => 'required',
            'id_software_type' => 'required'
          ]);
  
          Software::create($request->all());
          return redirect()->route('software.index')
                          ->with('success', 'new Software add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software = Software::find($id);
        return view('software.detail', compact('software'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software = Software::find($id);
        $software_types = SoftwareType::all();
        return view('software.edit')->with('software',$software)->with('software_types',$software_types);
                                                                                                
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_software' => 'required',
            'version' => 'required',
            'id_software_type' => 'required'
          ]);
          $software = Software::find($id);
          $software->name_software = $request->get('name_software');
          $software->version = $request->get('version');
          $software->id_software_type = $request->get('id_software_type');
          $software->description = $request->get('description');
          $software->observation = $request->get('observation');
          $software->save();
          return redirect()->route('software.index')
                          ->with('success', 'Software updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software = Software::find($id);
        $software->delete();
        return redirect()->route('software.index')
                        ->with('success', 'Software deleted successfully');
    }
}

