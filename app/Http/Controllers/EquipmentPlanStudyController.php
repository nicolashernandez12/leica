<?php

namespace App\Http\Controllers;

use App\EquipmentPlanStudy;
use App\StudyPlan;
use App\ActiveInput;
use Illuminate\Http\Request;

class EquipmentPlanStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('equipment_plan_study.index')->with('equipment_plan_studies',EquipmentPlanStudy::with('activeInput')->get(),
                                                                                EquipmentPlanStudy::with('studyPlan')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study_plans = StudyPlan::all();
        $active_inputs = ActiveInput::all();
        return view('equipment_plan_study.create', compact('study_plans','active_inputs'));
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
            'id_study_plan' => 'required',
            'id_active_input' => 'required'
          ]);
  
          EquipmentPlanStudy::create($request->all());
          return redirect()->route('equipment_plan_study.index')
                          ->with('success', 'new equipment plan study added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentPlanStudy  $EquipmentPlanStudy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment_plan_study = EquipmentPlanStudy::find($id);
        return view('equipment_plan_study.detail', compact('equipment_plan_study'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentPlanStudy  $EquipmentPlanStudy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment_plan_study = EquipmentPlanStudy::find($id);
        $study_plans = StudyPlan::all();
        $active_inputs = ActiveInput::all();
        return view('equipment_plan_study.edit')->with('equipment_plan_study',$equipment_plan_study)->with('study_plans',$study_plans)
                                                                                        ->with('active_inputs',$active_inputs);
                                                                                                
                                                                                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentPlanStudy  $EquipmentPlanStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_study_plan' => 'required',
            'id_active_input' => 'required',
          ]);
          $equipment_plan_study = EquipmentPlanStudy::find($id);
          $equipment_plan_study->id_study_plan = $request->get('id_study_plan');
          $equipment_plan_study->id_active_input = $request->get('id_active_input');
          $equipment_plan_study->save();
          return redirect()->route('equipment_plan_study.index')
                          ->with('success', 'equipment plan study updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipmentPlanStudy  $EquipmentPlanStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment_plan_study = EquipmentPlanStudy::find($id);
        $equipment_plan_study->delete();
        return redirect()->route('equipment_plan_study.index')
                        ->with('success', 'equipment plan study deleted successfully');
    }
}
