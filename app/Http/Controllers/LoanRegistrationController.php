<?php

namespace App\Http\Controllers;

use App\LoanRegistration;
use App\Inventory;
use App\Lending;
use Illuminate\Http\Request;

class LoanRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loan_registration.index')->with('loan_registrations',LoanRegistration::with('lending')->get(),
        LoanRegistration::with('inventory')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventories = Inventory::all();
        $lendings = Lending::all();
        return view('loan_registration.create', compact('inventories','lendings'));
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
            'id_lending' => 'required'
          ]);
  
          LoanRegistration::create($request->all());
          return redirect()->route('loan_registration.index')
                          ->with('success', 'registro de prestamo agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoanRegistration  $loanRegistration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan_registration = LoanRegistration::find($id);
        return view('loan_registration.detail', compact('loan_registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoanRegistration  $loanRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan_registration = LoanRegistration::find($id);
        $inventories = Inventory::all();
        $lendings = Lending::all();
        return view('loan_registration.edit')->with('loan_registration',$loan_registration)->with('inventories',$inventories)
                                                                                        ->with('lendings',$lendings);
                                                                                                
                                                                                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoanRegistration  $loanRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_inventory' => 'required',
            'id_lending' => 'required',
          ]);
          $loan_registration = LoanRegistration::find($id);
          $loan_registration->id_inventory = $request->get('id_inventory');
          $loan_registration->id_lending = $request->get('id_lending');
          $loan_registration->save();
          return redirect()->route('loan_registration.index')
                          ->with('success', 'registro de prestamo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoanRegistration  $loanRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan_registration = LoanRegistration::find($id);
        $loan_registration->delete();
        return redirect()->route('loan_registration.index')
                        ->with('success', 'registro de prestamo eliminado exitosamente');
    }
}
