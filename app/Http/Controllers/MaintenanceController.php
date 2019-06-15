<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\UserData;
use App\Inventory;
use App\Reason;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maintenance.index')->with('maintenances',Maintenance::with('userData')->get(),
                                                            Maintenance::with('reason')->get(),
                                                            Maintenance::with('inventory')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = UserData::all();
        $reasons = Reason::all();
        $inventories = Inventory::all();
        return view('maintenance.create', compact('inventories','users','reasons'));
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
            'id_user' => 'required',
            'id_inventory' => 'required',
            'id_reason' => 'required',
            'date_maintenance' => 'required',
          ]);
  
          Maintenance::create($request->all());
          return redirect()->route('maintenance.index')
                          ->with('success', 'new maintenance added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance = Maintenance::find($id);
        return view('maintenance.detail', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance = Maintenance::find($id);
        $inventories = Inventory::all();
        $users = UserData::all();
        $reasons = Reason::all();
        return view('maintenance.edit')->with('maintenance',$maintenance)
                                        ->with('inventories',$inventories)
                                        ->with('reasons',$reasons)
                                        ->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'date_maintenance' => 'required',
            'id_user' => 'required',
            'id_reason' => 'required',
            'id_inventory' => 'required',
          ]);
          $maintenance = Maintenance::find($id);
          $maintenance->date_maintenance = $request->get('date_maintenance');
          $maintenance->id_user = $request->get('id_user');
          $maintenance->id_inventory = $request->get('id_inventory');
          $maintenance->id_reason = $request->get('id_reason');
          $maintenance->save();
          return redirect()->route('maintenance.index')
                          ->with('success', 'maintenance name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);
        $maintenance->delete();
        return redirect()->route('maintenance.index')
                        ->with('success', 'maintenance deleted successfully');
    }
}
