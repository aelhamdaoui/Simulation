<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salle;


class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $salle = Salle::all();
        return view('salle.index')->with('salle',$salle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

        return view('salle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required',
            
        ];
        $message = [
           
            'nom.required' => 'Le champ salle est obligatoire'
        ];
        $this->validate($request,$rules,$message);

        $salle = new Salle();
  
        $salle->nom = strtoupper($request->input('nom'));
        $this->authorize('create', $salle);
        $salle->save();
        session()->flash('ajouter','La salle a été ajouté avec succés');
        return redirect(route('salle.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salle = Salle::find($id);
        $this->authorize('update', $salle);
        return view('salle.edit')->with('salle',$salle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nom' => 'required',
            
        ];
        $message = [
           
            'nom.required' => 'Le champ salle est obligatoire'
        ];
        $this->validate($request,$rules,$message);
        
        $salle = Salle::find($id);
        
        $salle->nom = strtoupper($request->input('nom'));
        $salle->save();
        session()->flash('modifier','La salle a été modifé avec succés');
        return redirect(route('salle.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salle = Salle::find($id);
        $this->authorize('delete', $salle);
        $salle->delete();
        session()->flash('supprimer','La salle a été supprimé avec succés');
        return redirect(route('salle.index'));
    }
}
