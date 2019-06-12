<?php

namespace App\Http\Controllers;

use App\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reasons = Reason::latest()->paginate(5);
        return view('reason.index', compact('reasons'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reason.create');
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
            'reason_name' => 'required',
            'description' => 'required'
          ]);
  
          Reason::create($request->all());
          return redirect()->route('reason.index')
                          ->with('success', 'new reason created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reason = reason::find($id);
        return view('reason.detail', compact('reason'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reason = Reason::find($id);
        return view('reason.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'reason_name' => 'required',
            'description' => 'required'
          ]);
          $reason = Reason::find($id);
          $reason->reason_name = $request->get('reason_name');
          $reason->description = $request->get('description');
          $reason->save();
          return redirect()->route('reason.index')
                          ->with('success', 'reason name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reason = Reason::find($id);
        $reason->delete();
        return redirect()->route('reason.index')
                        ->with('success', 'reason deleted successfully');
    }
}
