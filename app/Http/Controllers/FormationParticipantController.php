<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;
use App\ParticipantFormation;
use App\Type_participant;
use App\Participant;


class FormationParticipantController extends Controller
{

    public function __construct(Request $req){

        //$this->middleware('auth');
    }
    
    
    public function index($link,$id,$enc)
    {

    	$formation = Formation::find($id);
        $formation_participant = ParticipantFormation::where('formation_id',$id)
        ->where('encadrant',$enc)
        ->get();
    	return view('formation_participant.index')->with('formation',$formation)->with('enc',$enc);
    }

    public function create($link,$id,$enc){
        
    	$formation = Formation::find($id);
        $type = Type_participant::all();
    	return view('formation_participant.create')->with('formation',$formation)->with('type',$type)->with('enc',$enc);
    }

    public function store(Request $request,$link,$id,$enc){
        

        $count = 0;
        $par = null;
        $formation = Formation::find($id);
        $formation_participant = new ParticipantFormation();
        $participant = null;


        if ($request->isMethod('post')){
            if($request->input('type') == 10)
            {
            $rules = [
            'nom2' => 'required',
            'prenom' =>'required',
            'cin' =>'required',
            'statut' =>'required',
        ];
            $message = [
            'nom2.required' => 'Le champ nom est obligatoire',
            'prenom.required' => 'Le champ prénom est obligatoire',
            'cin.required' => 'Le champ cin est obligatoire',
            'statut.required' => 'Le champ statut est obligatoire',

        ];
            }

            else if($request->input('type') >= 5)
            {
            $rules = [
            'nom2' => 'required',
            'prenom' =>'required',
            'cin' =>'required',
        ];
            $message = [
            'nom2.required' => 'Le champ nom est obligatoire',
            'prenom.required' => 'Le champ prénom est obligatoire',
            'cin.required' => 'Le champ cin est obligatoire',

        ];
            }

            else
            {
            $rules = [
            'nom' => 'required',

        ];
            $message = [
            'nom.required' => 'Le champ nom et prénom est obligatoire',


        ];
            
            }
       
        $this->validate($request,$rules,$message);

        
if($request->input('type')>=5 )
{
        $par = Participant::where('nom',$request->input('nom2'))
        ->where('prenom',$request->input('prenom'))
        ->get();
        $count = $par->count();

        if($count == 0)
        {
        $participant = new Participant();
        $participant->type_participant_id = $request->input('type');
        $participant->nom = strtoupper($request->input('nom2'));
        $participant->prenom = strtoupper($request->input('prenom'));

        if($request->input('type')==10 )
        {
            $participant->statut = strtoupper($request->input('statut'));
        }
        
        

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
        $participant->save();

        }
        
}

    if($request->input('type')>=5){

      if($count != 0){

         foreach($par as $p){

             $formation_participant->participant_id = $p->id;

        }
        
            $formation_participant->formation_id = $id ;

            if($request->has('encadrant')  and $enc == 1)
            $formation_participant->encadrant = 1;
            else
            $formation_participant->encadrant = 0;
            
            $formation_participant->save();
      }
      else
      {
            
             $formation_participant->participant_id = $participant->id;
        
            $formation_participant->formation_id = $id ;

            if($request->has('encadrant')  and $enc == 1)
            $formation_participant->encadrant = 1;
            else
            $formation_participant->encadrant = 0;
            
            $formation_participant->save();
      }

       
    }  
    
else{


        
            if($request->has('nom1'))
            {
            
            $formation_participant->participant_id = $request->input('nom1');
            $formation_participant->formation_id = $id ;
            
            if($request->has('encadrant') and $enc == 1)
            $formation_participant->encadrant = 1;
            else
            $formation_participant->encadrant = 0;

            $formation_participant->save();
                }
            
            }
            
    	
        return view('formation_participant.index')->with('formation',$formation)->with('enc',$enc);
            }
          
    }

    public function delete($link,$participantid,$formationid,$enc){
       
        $formation = Formation::find($formationid);
        $pf = ParticipantFormation::where('participant_id',$participantid)->where('formation_id',$formationid)->first();
        $pf->delete();
        session()->flash('supprimer','Le participant a été supprimé avec succés');

        return redirect(route('show_par',[$link,$formationid,$enc]));
    }

    public function select($x){

       $par = Participant::where('type_participant_id',$x)->get();

        return response()->json($par);
    }


}
