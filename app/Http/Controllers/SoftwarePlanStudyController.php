<?php

namespace App\Http\Controllers;

use App\SoftwarePlanStudy;
use App\StudyPlan;
use App\Software;
use Illuminate\Http\Request;

class SoftwarePlanStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('software_plan_study.index')->with('software_plan_studies',SoftwarePlanStudy::with('studyPlan')->get(),
                                                                                SoftwarePlanStudy::with('software')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study_plans = StudyPlan::all();
        $softwares = Software::all();
        return view('software_plan_study.create', compact('study_plans','softwares'));
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
            'id_software' => 'required'
          ]);
  
          SoftwarePlanStudy::create($request->all());
          return redirect()->route('software_plan_study.index')
                          ->with('success', 'software plan estudio agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoftwarePlanStudy  $softwarePlanStudy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software_plan_study = SoftwarePlanStudy::find($id);
        return view('software_plan_study.detail', compact('software_plan_study'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoftwarePlanStudy  $softwarePlanStudy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software_plan_study = SoftwarePlanStudy::find($id);
        $study_plans = StudyPlan::all();
        $softwares = Software::all();
        return view('software_plan_study.edit')->with('software_plan_study',$software_plan_study)->with('study_plans',$study_plans)
                                                                                        ->with('softwares',$softwares);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoftwarePlanStudy  $softwarePlanStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_study_plan' => 'required',
            'id_software' => 'required',
          ]);
          $software_plan_study = SoftwarePlanStudy::find($id);
          $software_plan_study->id_study_plan = $request->get('id_study_plan');
          $software_plan_study->id_software = $request->get('id_software');
          $software_plan_study->save();
          return redirect()->route('software_plan_study.index')
                          ->with('success', 'software plan estudio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoftwarePlanStudy  $softwarePlanStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software_plan_study = SoftwarePlanStudy::find($id);
        $software_plan_study->delete();
        return redirect()->route('software_plan_study.index')
                        ->with('success', 'software plan de estudio eliminado exitosamente');
    }
}
