<?php

namespace App\Http\Controllers;

use App\TypeShrinkage;
use Illuminate\Http\Request;

class TypeShrinkageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_shrinkages = TypeShrinkage::latest()->paginate(5);
        return view('type_shrinkage.index', compact('type_shrinkages'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_shrinkage.create');
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
            'type_shrinkage_name' => 'required',
            'description' => 'required'
          ]);
  
          TypeShrinkage::create($request->all());
          return redirect()->route('type_shrinkage.index')
                          ->with('success', 'new type_shrinkage created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\type_shrinkage  $type_shrinkage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_shrinkage = TypeShrinkage::find($id);
        return view('type_shrinkage.detail', compact('type_shrinkage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\type_shrinkage  $type_shrinkage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_shrinkage = TypeShrinkage::find($id);
        return view('type_shrinkage.edit', compact('type_shrinkage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\type_shrinkage  $type_shrinkage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'type_shrinkage_name' => 'required',
            'description' => 'required'
          ]);
          $type_shrinkage = TypeShrinkage::find($id);
          $type_shrinkage->type_shrinkage_name = $request->get('type_shrinkage_name');
          $type_shrinkage->description = $request->get('description');
          $type_shrinkage->save();
          return redirect()->route('type_shrinkage.index')
                          ->with('success', 'type_shrinkage name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\type_shrinkage  $type_shrinkage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_shrinkage = TypeShrinkage::find($id);
        $type_shrinkage->delete();
        return redirect()->route('type_shrinkage.index')
                        ->with('success', 'type_shrinkage deleted successfully');
    }
}
