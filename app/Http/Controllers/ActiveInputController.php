<?php

namespace App\Http\Controllers;

use App\ActiveInput;
use App\Modelo;
use App\MaintenancePlan;
use App\Category;
use Illuminate\Http\Request;

class ActiveInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('active_input.index')->with('active_inputs',
        ActiveInput::with('model')->get(),
        ActiveInput::with('maintenancePlan')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $models = Modelo::all();
        $maintenance_plans = MaintenancePlan::all();
        return view('active_input.create', compact('models','maintenance_plans','categories'));
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
            'input_name' => 'required',
            'uf_value' => 'required',

            'id_model' => 'required',
            'id_category' => 'required',
            'id_maintenance_plan' => 'required'
          ]);
  
          ActiveInput::create($request->all());
          return redirect()->route('active_input.index')
                          ->with('success', 'activo inzumo agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActiveInput  $activeInput
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active_input = ActiveInput::find($id);
        return view('active_input.detail', compact('active_input'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActiveInput  $activeInput
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active_input = ActiveInput::find($id);
        $models = Modelo::all();
        $categories = Category::all();
        $maintenance_plans = MaintenancePlan::all();
        return view('active_input.edit')->with('active_input',$active_input)->with('models',$models)->with('categories',$categories)
                                                                                        ->with('maintenance_plans',$maintenance_plans);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActiveInput  $activeInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'input_name' => 'required',
            'id_model' => 'required',
            'id_maintenance_plan' => 'required',

            'id_category' => 'required',
            'uf_value' => 'required'
          ]);
          $active_input = ActiveInput::find($id);
          $active_input->input_name = $request->get('input_name');
          $active_input->uf_value = $request->get('uf_value');
          $active_input->characteristic = $request->get('characteristic');
          $active_input->observation = $request->get('observation');
          $active_input->description = $request->get('description');

          $active_input->id_model = $request->get('id_model');
          $active_input->id_category = $request->get('id_category');
          $active_input->id_maintenance_plan = $request->get('id_maintenance_plan');
          $active_input->save();
          return redirect()->route('active_input.index')
                          ->with('success', 'activo inzumo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActiveInput  $activeInput
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $active_input = ActiveInput::find($id);
        $active_input->delete();
        return redirect()->route('active_input.index')
                        ->with('success', 'activo inzumo eliminado exitosamente');
    }
}
