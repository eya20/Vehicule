<?php

namespace App\Http\Controllers;

use App\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles = Modele::all();
        return view('modeles.index',compact('modeles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modeles.create');
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
  
        Modele::create($request->all());
   
        return redirect()->route('modele.index')
                        ->with('success','Model created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele  $modele)
    {
        $vehicules = DB::table('vehicules')->where('modele', $modele->id)->get();
        return view('modeles.show',compact('vehicules','modele'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele  $modele)
    {
        return view('modeles.edit',compact('modele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele  $modele)
    {
        $request->validate([
            'nom' => 'required',
        ]);
  
        $modele->update($request->all());
  
        return redirect()->route('modele.index')
                        ->with('success','Model updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele  $modele)
    {
        $modele->delete();
  
        return redirect()->route('modele.index')
                        ->with('success','Model deleted successfully');
    }
}
