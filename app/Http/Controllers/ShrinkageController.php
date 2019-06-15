<?php

namespace App\Http\Controllers;

use App\Shrinkage;
use App\Inventory;
use App\TypeShrinkage;
use Illuminate\Http\Request;

class ShrinkageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shrinkage.index')->with('shrinkages',Shrinkage::with('typeShrinkage')->get(),
        Shrinkage::with('inventory')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        $type_shrinkages = TypeShrinkage::all();
        return view('shrinkage.create', compact('inventories','type_shrinkages'));
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
            'id_inventory' => 'required',
            'id_type_shrinkage' => 'required'
          ]);
  
          Shrinkage::create($request->all());
          return redirect()->route('shrinkage.index')
                          ->with('success', 'new Shrinkages added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shrinkage  $shrinkage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shrinkage = Shrinkage::find($id);
        return view('shrinkage.detail', compact('shrinkage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shrinkage  $shrinkage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shrinkage = Shrinkage::find($id);
        $inventories = Inventory::all();
        $type_shrinkages = TypeShrinkage::all();
        return view('shrinkage.edit')->with('shrinkage',$shrinkage)->with('inventories',$inventories)
                                                                                        ->with('type_shrinkages',$type_shrinkages);
                                                                                                
                                                                                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shrinkage  $shrinkage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_inventory' => 'required',
            'id_type_shrinkage' => 'required',
          ]);
          $shrinkage = Shrinkage::find($id);
          $shrinkage->id_inventory = $request->get('id_inventory');
          $shrinkage->id_type_shrinkage = $request->get('id_type_shrinkage');
          $shrinkage->save();
          return redirect()->route('shrinkage.index')
                          ->with('success', 'Shrinkages updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shrinkage  $shrinkage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shrinkage = Shrinkage::find($id);
        $shrinkage->delete();
        return redirect()->route('shrinkage.index')
                        ->with('success', 'Shrinkages deleted successfully');
    }
}
