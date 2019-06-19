<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\ActiveInput;
use App\State;
use App\Place;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.index')->with('inventories',
        Inventory::with('activeInput')->get(),
        Inventory::with('place')->get(),
        Inventory::with('state')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all();
        $active_inputs = ActiveInput::all();
        $states = State::all();
        return view('inventory.create', compact('active_inputs','states','places'));
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
            'quantity' => 'required',
            'serial_number' => 'required',
            'id_active_input' => 'required',
            'id_state' => 'required',
            'id_place' => 'required'
          ]);
  
          Inventory::create($request->all());
          return redirect()->route('inventory.index')
                          ->with('success', 'inventario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.detail', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        $places = Place::all();
        $active_inputs = ActiveInput::all();
        $states = State::all();
        return view('inventory.edit')->with('inventory',$inventory)->with('active_inputs',$active_inputs)->with('places',$places)
                                                                            ->with('states',$states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required',
            'id_active_input' => 'required',
            'id_state' => 'required',
            'serial_number' => 'required',
            'id_place' => 'required'
          ]);
          $inventory = Inventory::find($id);
          $inventory->quantity = $request->get('quantity');
          $active_input->serial_number = $request->get('serial_number');
          $inventory->observation = $request->get('observation');
          $inventory->id_active_input = $request->get('id_active_input');
          $inventory->id_state = $request->get('id_state');
          $inventory->id_place = $request->get('id_place');
          $inventory->save();
          return redirect()->route('inventory.index')
                          ->with('success', 'inventario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->route('inventory.index')
                        ->with('success', 'inventario eliminado exitosamente');
    }
}
