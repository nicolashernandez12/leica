<?php

namespace App\Http\Controllers;

use App\Frequency;
use Illuminate\Http\Request;

class FrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frequencies = Frequency::latest()->paginate(5);
        return view('frequency.index', compact('frequencies'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frequency.create');
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
            'frequency_name' => 'required',
            'description' => 'required'
          ]);
  
          Frequency::create($request->all());
          return redirect()->route('frequency.index')
                          ->with('success', 'new frequency created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frequency = Frequency::find($id);
        return view('frequency.detail', compact('frequency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('frequency.edit');
        $frequency = Frequency::find($id);
        return view('frequency.edit', compact('frequency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'frequency_name' => 'required',
            'description' => 'required'
          ]);
          $frequency = Frequency::find($id);
          $frequency->frequency_name = $request->get('frequency_name');
          $frequency->description = $request->get('description');
          $frequency->save();
          return redirect()->route('frequency.index')
                          ->with('success', 'frequency name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frequency = Frequency::find($id);
        $frequency->delete();
        return redirect()->route('frequency.index')
                        ->with('success', 'frequency deleted successfully');
    }
}
