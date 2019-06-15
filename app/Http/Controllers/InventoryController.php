<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Place;
use App\ActiveInput;
use App\State;
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
        $active_inputs = ActiveInput::all();
        $states = State::all();
        $places = Place::all();
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
            'id_active_input' => 'required',
            'id_state' => 'required',
            'id_place' => 'required'
          ]);
  
          Inventory::create($request->all());
          return redirect()->route('inventory.index')
                          ->with('success', 'new Inventory add successfully');
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
        $active_inputs = ActiveInput::all();
        $states = State::all();
        $places = Place::all();
        return view('inventory.edit')->with('inventory',$inventory)->with('active_inputs',$active_inputs)
                                                                            ->with('states',$states)
                                                                            ->with('places',$places);
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
            'id_place' => 'required'
          ]);
          $inventory = Inventory::find($id);
          $inventory->quantity = $request->get('quantity');
          $inventory->observation = $request->get('observation');
          $inventory->id_active_input = $request->get('id_active_input');
          $inventory->id_place = $request->get('id_place');
          $inventory->id_state = $request->get('id_state');
          $inventory->save();
          return redirect()->route('inventory.index')
                          ->with('success', 'Inventory updated successfully');
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
                        ->with('success', 'Active Input deleted successfully');
    }
}
