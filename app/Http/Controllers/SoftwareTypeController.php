<?php

namespace App\Http\Controllers;

use App\SoftwareType;
use Illuminate\Http\Request;

class SoftwareTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software_types = SoftwareType::latest()->paginate(5);
        return view('software_type.index', compact('software_types'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('software_type.create');
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
            'software_type_name' => 'required',
            'description' => 'required'
          ]);
  
          SoftwareType::create($request->all());
          return redirect()->route('software_type.index')
                          ->with('success', 'new software_type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\software_type  $software_type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software_type = SoftwareType::find($id);
        return view('software_type.detail', compact('software_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\software_type  $software_type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software_type = SoftwareType::find($id);
        return view('software_type.edit', compact('software_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\software_type  $software_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'software_type_name' => 'required',
            'description' => 'required'
          ]);
          $software_type = SoftwareType::find($id);
          $software_type->software_type_name = $request->get('software_type_name');
          $software_type->description = $request->get('description');
          $software_type->save();
          return redirect()->route('software_type.index')
                          ->with('success', 'software_type name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\software_type  $software_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software_type = SoftwareType::find($id);
        $software_type->delete();
        return redirect()->route('software_type.index')
                        ->with('success', 'software_type deleted successfully');
    }
}
