<?php

namespace App\Http\Controllers;

use App\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::latest()->paginate(5);
        return view('priority.index', compact('priorities'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('priority.create');
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
            'priority_name' => 'required',
            'description' => 'required'
          ]);
  
          priority::create($request->all());
          return redirect()->route('priority.index')
                          ->with('success', 'new priority created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priority = Priority::find($id);
        return view('priority.detail', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('priority.edit');
        $priority = Priority::find($id);
        return view('priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'priority_name' => 'required',
            'description' => 'required'
          ]);
          $priority = Priority::find($id);
          $priority->priority_name = $request->get('priority_name');
          $priority->description = $request->get('description');
          $priority->save();
          return redirect()->route('priority.index')
                          ->with('success', 'priority name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priority = Priority::find($id);
        $priority->delete();
        return redirect()->route('priority.index')
                        ->with('success', 'priority deleted successfully');
    }
}
