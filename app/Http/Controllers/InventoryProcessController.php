<?php

namespace App\Http\Controllers;

use App\InventoryProcess;
use App\TypeInventory;
use Illuminate\Http\Request;

class InventoryProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory_process.index')->with('inventory_processes',InventoryProcess::with('typeInventory')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_inventories = TypeInventory::all();
        return view('inventory_process.create', compact('type_inventories'));
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
            'date_execution' => 'required',
            'id_type_inventory' => 'required',
          ]);
  
          InventoryProcess::create($request->all());
          return redirect()->route('inventory_process.index')
                          ->with('success', 'new inventory process added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inventory_process  $inventory_process
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory_process = InventoryProcess::find($id);
        return view('inventory_process.detail', compact('inventory_process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inventory_process  $inventory_process
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory_process = InventoryProcess::find($id);
        $type_inventories = TypeInventory::all();
        return view('inventory_process.edit')->with('inventory_process',$inventory_process)->with('type_inventories',$type_inventories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inventory_process  $inventory_process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'date_execution' => 'required',
            'id_type_inventory' => 'required'
          ]);
          $inventory_process = InventoryProcess::find($id);
          $inventory_process->date_execution = $request->get('date_execution');
          $inventory_process->id_type_inventory = $request->get('id_type_inventory');
          $inventory_process->save();
          return redirect()->route('inventory_process.index')
                          ->with('success', 'inventory process name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inventory_process  $inventory_process
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory_process = InventoryProcess::find($id);
        $inventory_process->delete();
        return redirect()->route('inventory_process.index')
                        ->with('success', 'inventory process deleted successfully');
    }
}
