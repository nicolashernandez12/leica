<?php

namespace App\Http\Controllers;

use App\MaintenancePlan;
use App\Priority;
use App\Frequency;
use Illuminate\Http\Request;

class MaintenancePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maintenance_plan.index')->with('maintenance_plans',
            MaintenancePlan::with('priority')->get(),
            MaintenancePlan::with('frequency')->get());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frequencies = Frequency::all();
        $priorities = Priority::all();
        return view('maintenance_plan.create', compact('frequencies','priorities'));
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
            'maintenance_plan_name' => 'required',
            'description' => 'required',
            'id_priority' => 'required',
            'id_frequency' => 'required',
          ]);
  
          MaintenancePlan::create($request->all());
          return redirect()->route('maintenance_plan.index')
                          ->with('success', 'plan de mantencion agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance_plan = MaintenancePlan::find($id);
        return view('maintenance_plan.detail', compact('maintenance_plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance_plan = MaintenancePlan::find($id);
        $priorities = Priority::all();
        $frequencies = Frequency::all();
        return view('maintenance_plan.edit')->with('maintenance_plan',$maintenance_plan)->with('priorities',$priorities)
                                                                                        ->with('frequencies',$frequencies);
                                                                                                
                                                                                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'maintenance_plan_name' => 'required',
            'id_frequency' => 'required',
            'id_priority' => 'required',
            'description' => 'required'
          ]);
          $maintenance_plan = MaintenancePlan::find($id);
          $maintenance_plan->maintenance_plan_name = $request->get('maintenance_plan_name');
          $maintenance_plan->id_frequency = $request->get('id_frequency');
          $maintenance_plan->id_priority = $request->get('id_priority');
          $maintenance_plan->description = $request->get('description');
          $maintenance_plan->save();
          return redirect()->route('maintenance_plan.index')
                          ->with('success', 'plan de mantencion actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance_plan = MaintenancePlan::find($id);
        $maintenance_plan->delete();
        return redirect()->route('maintenance_plan.index')
                        ->with('success', 'plan de mantencion eliminada exitosamente');
    }
}
