<?php

namespace App\Http\Controllers;

use App\DifferenceInventory;
use App\Inventory;
use App\InventoryProcess;
use Illuminate\Http\Request;

class DifferenceInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('difference_inventory.index')->with('difference_inventories',DifferenceInventory::with('inventoryProcess')->get(),
        DifferenceInventory::with('inventory')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        $inventory_processes = InventoryProcess::all();
        return view('difference_inventory.create', compact('inventories','inventory_processes'));
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
            'difference'=>'required',
            'id_inventory' => 'required',
            'id_inventory_process' => 'required'
          ]);
  
          DifferenceInventory::create($request->all());
          return redirect()->route('difference_inventory.index')
                          ->with('success', 'new Difference Inventory added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DifferenceInventory  $differenceInventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $difference_inventory = DifferenceInventory::find($id);
        return view('difference_inventory.detail', compact('difference_inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DifferenceInventory  $differenceInventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $difference_inventory = DifferenceInventory::find($id);
        $inventories = Inventory::all();
        $inventory_processes = InventoryProcess::all();
        return view('difference_inventory.edit')->with('difference_inventory',$difference_inventory)->with('inventories',$inventories)
                                                                                        ->with('inventory_processes',$inventory_processes);
                                                                                                
                                                                                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DifferenceInventory  $differenceInventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'difference'=>'required',
            'id_inventory' => 'required',
            'id_inventory_process' => 'required',
          ]);
          $difference_inventory = DifferenceInventory::find($id);
          $difference_inventory->difference = $request->get('difference');
          $difference_inventory->id_inventory = $request->get('id_inventory');
          $difference_inventory->id_inventory_process = $request->get('id_inventory_process');
          $difference_inventory->save();
          return redirect()->route('difference_inventory.index')
                          ->with('success', 'Difference Inventory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DifferenceInventory  $differenceInventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $difference_inventory = DifferenceInventory::find($id);
        $difference_inventory->delete();
        return redirect()->route('difference_inventory.index')
                        ->with('success', 'Difference Inventory deleted successfully');
    }
}
