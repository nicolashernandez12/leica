<?php

namespace App\Http\Controllers;

use App\TypeInventory;
use Illuminate\Http\Request;

class TypeInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_inventories = TypeInventory::latest()->paginate(5);
        return view('type_inventory.index', compact('type_inventories'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_inventory.create');
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
            'type_inventory_name' => 'required',
            'description' => 'required'
          ]);
  
          TypeInventory::create($request->all());
          return redirect()->route('type_inventory.index')
                          ->with('success', 'tipo de inventario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\type_inventory  $type_inventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_inventory = TypeInventory::find($id);
        return view('type_inventory.detail', compact('type_inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\type_inventory  $type_inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_inventory = TypeInventory::find($id);
        return view('type_inventory.edit', compact('type_inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\type_inventory  $type_inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'type_inventory_name' => 'required',
            'description' => 'required'
          ]);
          $type_inventory = TypeInventory::find($id);
          $type_inventory->type_inventory_name = $request->get('type_inventory_name');
          $type_inventory->description = $request->get('description');
          $type_inventory->save();
          return redirect()->route('type_inventory.index')
                          ->with('success', 'tipo de inventario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\type_inventory  $type_inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_inventory = TypeInventory::find($id);
        $type_inventory->delete();
        return redirect()->route('type_inventory.index')
                        ->with('success', 'tipo de inventario eliminado exitosamente');
    }
}
