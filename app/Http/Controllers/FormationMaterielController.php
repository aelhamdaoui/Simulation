<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;
use App\MaterielFormation;
use App\Cat_materiel;
use App\Materiel;

class FormationMaterielController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
   public function index($id)
    {
    	$formation = Formation::find($id);
    	return view('formation_materiel.index')->with('formation',$formation);
    }
    public function create($id){
    	$formation = Formation::find($id);
        $type = Cat_materiel::all();
    	return view('formation_materiel.create')->with('formation',$formation)->with('type',$type);
    }
    public function store(Request $request,$id){
        if ($request->isMethod('post')){
            $rules = [
            'type' => 'required',
            'nom' =>'required'
        ];
        $message = [
            'type.required' => 'Le champ categorie est obligatoire',
            'nom.required' => 'Le champ materiel est obligatoire'
        ];
        $this->validate($request,$rules,$message);

        $formation = Formation::find($id);
    	$formation_materiel = new MaterielFormation();
    	$formation_materiel->materiel_id = $request->input('nom');;
    	$formation_materiel->formation_id = $id ;
    	$formation_materiel->save();
        return view('formation_materiel.index')->with('formation',$formation);
            }
            
    }

    public function delete($materielid,$formationid){
        $formation = Formation::find($formationid);
        $mf = MaterielFormation::where('materiel_id',$materielid)->where('formation_id',$formationid)->first();
        $mf->delete();
        session()->flash('supprimer','Le matériel a été supprimé avec succés');
        return redirect(route('show_mat',$formation));
    }

    public function select($x){

       $mat = Materiel::where('cat_materiel_id',$x)->get();

        return response()->json($mat);
    }
}
