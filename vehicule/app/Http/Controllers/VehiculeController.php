<?php

namespace App\Http\Controllers;

use App\Vehicule;
use App\Marque;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::latest()->paginate(5);
        return view('vehicules.index',compact('vehicules'))
                ->with('i',(request()->input('page',1)-1)*5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $marques = Marque::all();
        return view('vehicules.create',compact('marques'));
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
            'marque' => 'required',
            'modele' => 'required',
        ]);
  
        Vehicule::create($request->all());
   
        return redirect()->route('vehicule.index')
                        ->with('success','Car created successfully.');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show',compact('vehicule'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit',compact('vehicule'));
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'nom' => 'required',
            'marque' => 'required',
            'modele' => 'required',
        ]);
  
        $vehicule->update($request->all());
  
        return redirect()->route('vehicules.index')
                        ->with('success','Car updated successfully');
    }

   /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
  
        return redirect()->route('vehicules.index')
                        ->with('success','Car deleted successfully');
    }
}
