<?php

namespace App\Http\Controllers;

use App\Lending;
use App\UserData;
use App\Liable;
use App\Inventory;
use App\LoanRegistration;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lending.index')->with('lendings',Lending::with('userData')->get(),
                                                    Lending::with('liable')->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liables = Liable::all();
        $users = UserData::all();
        $inventories = Inventory::all();
        return view('lending.create', compact('liables','users','inventories'));
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
            'id_liable' => 'required',
            'id_user' => 'required',
            'loan_date' => 'required',
            'supposed_return_date' => 'required',
          ]);

          $lending = new Lending();
          $lending->id_liable = $request->get('id_liable');
          $lending->id_user = $request->get('id_user');
          $lending->loan_date = $request->get('loan_date');
          $lending->supposed_return_date= $request->get('supposed_return_date');
          $lending->save();
        
          $lending = $lending->id;

        if ($request->has('inventories')) {
            $inventories = $request->get('inventories');
              foreach ($inventories as $inventory) {
                  $new_assign_inventory = new LoanRegistration();
                  $new_assign_inventory->id_inventory = $inventory;
                  $new_assign_inventory->id_lending = $lending;
                  $new_assign_inventory->save();
              }
  
        }

        return redirect()->route('lending.index')
        ->with('success', 'prestamo agregado exitosamente');


        //   Lending::create($request->all());
        //   return redirect()->route('lending.index')
        //                   ->with('success', 'prestamo agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lending = Lending::find($id);
        return view('lending.detail', compact('lending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lending = Lending::find($id);
        $liables = Liable::all();
        $users = UserData::all();
        return view('lending.edit')->with('lending',$lending)->with('liables',$liables)->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'id_liable' => 'required',
            'id_user' => 'required',
            'loan_date' => 'required',
            'supposed_return_date' => 'required',
          ]);
          $lending = Lending::find($id);
          $lending->id_liable = $request->get('id_liable');
          $lending->id_user = $request->get('id_user');
          $lending->loan_date = $request->get('loan_date');
          $lending->supposed_return_date = $request->get('supposed_return_date');
          $lending->real_return_date = $request->get('real_return_date');
          $lending->save();
          return redirect()->route('lending.index')
                          ->with('success', 'prestamo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lending = Lending::find($id);
        $lending->delete();
        return redirect()->route('lending.index')
                        ->with('success', 'prestamo eliminado exitosamente');
    }
}
