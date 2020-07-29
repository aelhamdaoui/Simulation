<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type_participant;
use App\Participant;

class ParticipantController extends Controller
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
        $page = true;
        $participant = Participant::paginate(10);
        return view('participant.index')->with('participant',$participant)->with('page',$page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_participant = Type_participant::all();

        return view('participant.create')->with('type',$type_participant);
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
            'type' => 'required',
            'nom' =>'required',
            'prenom' =>'required'
        ];

        $this->validate($request,$rules);


        $participant = new Participant();
        $participant->type_participant_id = $request->input('type');
        $participant->nom = strtoupper($request->input('nom'));
        $participant->prenom = strtoupper($request->input('prenom'));
        $participant->sexe = $request->input('sexe');
        $participant->cin = strtoupper($request->input('cin'));

        $participant->naissance = $request->input('naissance');
        if ($request->input("sexe") == "F")
        {
            $participant->image = "images/encadrante.png";
        }
        else
        {
            $participant->image = "images/encadrant.png";
        }
        
        if ($request->hasFile('image')) {
    $participant->image = $request->file('image')->store('images');
        }
        $this->authorize('create', $participant);
        $participant->save();
        session()->flash('ajouter','Le participant a été ajouté avec succés');
        return redirect(route('participant.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $participant = Participant::find($id);
        return view('participant.show')->with('participant',$participant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participant::find($id);
        $this->authorize('update', $participant);
        $type_participant = Type_participant::all();
        
        return view('participant.edit')->with('participant',$participant)->with('type',$type_participant);
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
            'type' => 'required',
            'nom' =>'required',
            'prenom' =>'required',
        ];

        $this->validate($request,$rules);
        
        $participant = Participant::find($id);
        $participant->nom = strtoupper($request->input('nom'));
        $participant->prenom = strtoupper($request->input('prenom'));
        if($request->has('sexe')){
             $participant->sexe = $request->input('sexe');
        }
       
        if ($request->input("sexe") == "F")
        {
            $participant->image = "images/encadrante.png";
        }
        else
        {
            $participant->image = "images/encadrant.png";
        }
        
        if ($request->hasFile('image')) {
    $participant->image = $request->file('image')->store('images');
        }
        $participant->cin = strtoupper($request->input('cin'));
        $participant->naissance = $request->input('naissance');

        $participant->type_participant_id = $request->input('type');
        $participant->save();
        session()->flash('modifier','Le participant a été modifé avec succés');
        return redirect(route('participant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::find($id);
        $this->authorize('delete', $participant);
        $participant->delete();
        session()->flash('supprimer','Le participant a été supprimé avec succés');
        return redirect(route('participant.index'));
    }

    public function search(Request $request)
    {
         if ($request->isMethod('post')){
            $page = false;

        $result = $request->input('search');
        $participant = Participant::where('nom','like',"%{$result}%")
        ->orWhere('prenom','like',"%{$result}%")
        ->orWhere('cin','like',"%{$result}%")
        ->orWhereHas('typeParticipant', function ($query) use ($result) {
        $query->where('type', 'like', "%{$result}%");
        })
        ->get();    
        return view('participant.index')->with('participant',$participant)->with('page',$page);
            
        }
        return redirect(route('participant.index'));
    

}
}
