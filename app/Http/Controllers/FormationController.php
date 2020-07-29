<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Formation;
use App\Participant;

use Illuminate\Support\Facades\Auth;



class FormationController extends Controller
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
       $formation = Formation::where('user_id',Auth::user()->id)->get();
       if(Auth::user()->is_admin){
        $formation = Formation::orderBy('date','desc')->get();
       }
       

       return view('formation.index')->with('formation',$formation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('formation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $msg = "";
         $rules = [
            'titre' => 'required',
            'date' =>'required',
            'time' =>'required',
            'duree' => 'required',
        ];
        $message = [
            'titre.required' => 'Le champ titre est obligatoire',
            'date.required' => 'Le champ date est obligatoire',
            'time.required' => 'Le champ heure de début est obligatoire',
            'duree.required' => 'Le champ duree est obligatoire',
        ];
        $this->validate($request,$rules,$message);

        $formation = new Formation();
  
        $formation->titre = strtoupper($request->input('titre'));
        $formation->date = $request->input('date');
        $f = Formation::where('date',$formation->date);
        $count = $f->count();

        $formation->time = $request->input('time');
        $formation->duree = $request->input('duree');
        $formation->active=true;
        $formation->link = hash('crc32',uniqid());

        $formation->description = $request->input('description');
        $formation->user_id = Auth::user()->id;
        if($count > 1)
        {
            $msg = 'exsite déjà deux évènements programmés à la date choisie, Veuillez contacter l\'équipe Agadir-Sim';

        session()->flash("supprimer",$msg);
        return redirect(route('formation.index'));
        }
        
        else
        {
        $formation->save();
        session()->flash('ajouter','un événement a été ajouté avec succés');
        return redirect(route('formation.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::find($id);
        return view('formation.show')->with('formation',$formation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $formation = Formation::find($id);
         
          $this->authorize('update', $formation);
        return view('formation.edit')->with('formation',$formation);
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
            'titre' => 'required',
            'date' =>'required',
            'time' =>'required',
            'duree' => 'required',
        ];
        $message = [
            'titre.required' => 'Le champ titre est obligatoire',
            'date.required' => 'Le champ date est obligatoire',
            'time.required' => 'Le champ heure de début est obligatoire',
            'duree.required' => 'Le champ dureé est obligatoire',
        ];
        $this->validate($request,$rules,$message);
        
        $formation = Formation::find($id);
        
        $formation->titre = strtoupper($request->input('titre'));
        $formation->date = $request->input('date');
        $f = Formation::where('date',$formation->date);
        $count = $f->count();
        $formation->time = $request->input('time');
        $formation->duree = $request->input('duree');
        $formation->description=$request->input('description');
        $formation->user_id = Auth::user()->id;
        if($request->has('effectue'))
        $formation->effectue = 1;
        else
        $formation->effectue = 0;
        if($count > 1)
        {
        session()->flash("Supprimer","exsite déjà deux évènements programmés à la date choisie , Veuillez contacter l\'équipe Agadir-Sim");

        return redirect(route('formation.index'));
        }
        else
        {
        $formation->save();
        session()->flash('modifier','un événement a été modifé avec succés');
        return redirect(route('formation.index'));
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::find($id);
        $this->authorize('delete', $formation);
        $formation->delete();
        $formation->participants()->detach();
        $formation->salles()->detach();
        $formation->materiels()->detach();
        session()->flash('supprimer','un événement a été supprimé avec succés');
        return redirect(route('formation.index'));


        
    }

    public function search(Request $request)
    {

            
         if ($request->isMethod('post')){
            $page = false;

        $result = $request->input('search');
        $formation = Formation::where('titre','like',"%{$result}%")
        ->orWhere('date',$result)
        ->orderBy('date','desc')
        ->get();
        
        
        return view('formation.index')->with('formation',$formation)->with('page',$page);
            
        }
        return redirect(route('formation.index'));
    

}

    public function rapport(Request $request)
    {
        if ($request->isMethod('post')){

        $from = $request->input('from');
        $to = $request->input('to');
        $formation = Formation::where('date', '>=', $from)
                     ->where('date', '<=', $to)
                     ->where('effectue',1)
                     ->get();
        
        $pdf = \PDF::loadView('formation.rapport',array('fr'=>$formation,'from'=>$from,'to'=>$to));
            return $pdf->stream();
    }

    return view('formation.search');
    }

    public function certificate($event,$participant,$encadrant)
    {
        
        $formation = Formation::find($event);
        $participant = Participant::find($participant);

        $pdf = \PDF::loadView('formation.attestation',array('fr'=>$formation,'par'=>$participant,'enc'=>$encadrant))->setPaper('a4', 'landscape');

            return $pdf->stream();

    }

    public function activate($id)
    {
        $formation = Formation::find($id);
        $formation->active = !($formation->active);
        $formation->save();
        session()->flash('ajouter','l\état de cet évènement a été modifé avec succés');
        return redirect(route('formation.index'));

    }
}
