<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::latest()->paginate(5);
        return view('state.index', compact('states'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.create');
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
            'state_name' => 'required',
            'description' => 'required'
          ]);
  
          State::create($request->all());
          return redirect()->route('state.index')
                          ->with('success', 'new state created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::find($id);
        return view('state.detail', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'state_name' => 'required',
            'description' => 'required'
          ]);
          $state = State::find($id);
          $state->state_name = $request->get('state_name');
          $state->description = $request->get('description');
          $state->save();
          return redirect()->route('state.index')
                          ->with('success', 'state name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);
        $state->delete();
        return redirect()->route('state.index')
                        ->with('success', 'state deleted successfully');
    }
}
