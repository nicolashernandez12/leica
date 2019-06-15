<?php

namespace App\Http\Controllers;

use App\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trademarks = Trademark::latest()->paginate(5);
        return view('trademark.index', compact('trademarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trademark.create');
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
            'trademark_name' => 'required',
            'description' => 'required'
          ]);
  
          Trademark::create($request->all());
          return redirect()->route('trademark.index')
                          ->with('success', 'marca agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trademark = Trademark::find($id);
        return view('trademark.detail', compact('trademark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademark = Trademark::find($id);
        return view('trademark.edit', compact('trademark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'trademark_name' => 'required',
            'description' => 'required'
          ]);
          $trademark = Trademark::find($id);
          $trademark->trademark_name = $request->get('trademark_name');
          $trademark->description = $request->get('description');
          $trademark->save();
          return redirect()->route('trademark.index')
                          ->with('success', 'marca actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trademark = Trademark::find($id);
        $trademark->delete();
        return redirect()->route('trademark.index')
                        ->with('success', 'marca eliminada exitosamente');
    }
}
