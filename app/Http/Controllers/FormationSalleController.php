<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formation;
use App\SalleFormation;
use App\Salle;

class FormationSalleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    
    public function index($id)
    {
    	$formation = Formation::find($id);
    	return view('formation_salle.index')->with('formation',$formation);
    }
    public function create($id){
        $salle = Salle::all();
    	$formation = Formation::find($id);
        
    	return view('formation_salle.create')->with('formation',$formation)->with('salle',$salle);;
    }
    public function store(Request $request,$id){
        if ($request->isMethod('post')){
            $rules = [
            'nom' => 'required',
        ];
        $message = [
            'nom.required' => 'Le champ salle est obligatoire',
           
        ];
        $this->validate($request,$rules,$message);
        $formation = Formation::find($id);
    	$formation_salle = new SalleFormation();
    	$formation_salle->salle_id = $request->input('nom');;
    	$formation_salle->formation_id = $id ;
    	$formation_salle->save();
        return view('formation_salle.index')->with('formation',$formation);
            }
            
    }

    public function delete($salleid,$formationid){
        $formation = Formation::find($formationid);
        $sf = SalleFormation::where('salle_id',$salleid)->where('formation_id',$formationid)->first();
        $sf->delete();
        session()->flash('supprimer','La salle a été supprimé avec succés');
        return redirect(route('show_sal',$formation));
    }


}
