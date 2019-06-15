<?php

namespace App\Http\Controllers;

use App\ActiveInput;
use App\ActivesByStudyPlan;
use App\Software;
use App\SoftwareByStudyPlan;
use App\StudyPlan;
use App\Career;
use Illuminate\Http\Request;

class StudyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('study_plan.index')->with('study_plans', StudyPlan::with('career')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Career::all();
        $active_inputs = ActiveInput::all();
        $softwares = Software::all();
        return view('study_plan.create',
            compact('careers', 'active_inputs', 'softwares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'study_plan_name' => 'required',
            'id_career' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        // $study_plan = StudyPlan::create($request->all());
        $study_plan = new StudyPlan();
        $study_plan->study_plan_name = $request->get('study_plan_name');
        $study_plan->id_career = $request->get('id_career');
        $study_plan->date_start = $request->get('date_start');
        $study_plan->date_end = $request->get('date_end');
        $study_plan->save();

        return redirect()->route('study_plan.index')
            ->with('success', 'plan de estudio agregado exitosamente');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $study_plan = StudyPlan::with('actives', 'softwares')->where('id', $id)->get();
        $study_plan = $study_plan->first();
        return view('study_plan.detail', compact('study_plan'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $study_plan = StudyPlan::find($id);
        $careers = Career::all();

        return view('study_plan.edit')
         ->with('study_plan', $study_plan)->with('careers', $careers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\StudyPlan $studyPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'study_plan_name' => 'required',
            'id_career' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);
        $study_plan = StudyPlan::find($id);
        $study_plan->study_plan_name = $request->get('study_plan_name');
        $study_plan->id_career = $request->get('id_career');
        $study_plan->date_start = $request->get('date_start');
        $study_plan->date_end = $request->get('date_end');
        $study_plan->save();

        return redirect()->route('study_plan.index')
            ->with('success', 'plan de estudio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\StudyPlan $studyPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study_plan = StudyPlan::find($id);
        $study_plan->delete();
        return redirect()->route('study_plan.index')
            ->with('success', 'plan de estudio eliminado exitosamente');
    }
}
