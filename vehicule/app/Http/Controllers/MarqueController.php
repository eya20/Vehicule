<?php

namespace App\Http\Controllers;

use App\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = Marque::all();
        return view('marques.index',compact('marques'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marques.create');
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
            'nom' => 'required',
        ]);
  
        Marque::create($request->all());
   
        return redirect()->route('marque.index')
                        ->with('success','mark created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        $vehicules = DB::table('vehicules')->where('marque', $marque->id)->get();
        return view('marques.show',compact('vehicules','marque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(Marque $marque)
    {
        return view('marques.edit',compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque  $marque)
    {
        $request->validate([
            'nom' => 'required',
        ]);
  
        $marque->update($request->all());
  
        return redirect()->route('marque.index')
                        ->with('success','mark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque  $marque)
    {
        $marque->delete();
  
        return redirect()->route('marque.index')
                        ->with('success','mark deleted successfully');
    }
}
