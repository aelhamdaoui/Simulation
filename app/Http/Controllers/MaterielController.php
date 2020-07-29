<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat_materiel;
use App\Materiel;

class MaterielController extends Controller
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
        $materiel = Materiel::paginate(5);
        return view('materiel.index')->with('materiel',$materiel)->with('page',$page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_materiel = Cat_materiel::all();

        return view('materiel.create')->with('cat',$cat_materiel);
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
            'cat' => 'required',
            'nom' =>'required'
        ];
        $message = [
            'cat.required' => 'Le champ categorie est obligatoire',
            'nom.required' => 'Le champ materiel est obligatoire'
        ];
        $this->validate($request,$rules,$message);

        $materiel = new Materiel();
        $materiel->cat_materiel_id = $request->input('cat');
        $materiel->nom = strtoupper($request->input('nom'));
        $materiel->marque = strtoupper($request->input('marque'));
        $materiel->model = strtoupper($request->input('model'));
        if ($request->hasFile('image')) {

    $materiel->image = $request->file('image')->store('images/materiel');
        }
         $this->authorize('create', $materiel);
        $materiel->save();
        session()->flash('ajouter','Le matériel a été ajouté avec succés');
        return redirect(route('materiel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $materiel = Materiel::find($id);
        return view('materiel.show')->with('materiel',$materiel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiel = Materiel::find($id);
        $this->authorize('update', $materiel);
        $cat_materiel = Cat_materiel::all();
        return view('materiel.edit')->with('materiel',$materiel)->with('cat',$cat_materiel);
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
            'cat' => 'required',
            'nom' =>'required'
        ];
        $message = [
            'cat.required' => 'Le champ categorie est obligatoire',
            'nom.required' => 'Le champ materiel est obligatoire'
        ];
        $this->validate($request,$rules,$message);
        
        $materiel = Materiel::find($id);
        
        $materiel->nom = strtoupper($request->input('nom'));
        $materiel->marque = strtoupper($request->input('marque'));
        $materiel->model = strtoupper($request->input('model'));
        $materiel->cat_materiel_id = $request->input('cat');
         
        if ($request->hasFile('image')) {

    $materiel->image = $request->file('image')->store('images/materiel');
        }
        $materiel->save();
        session()->flash('modifier','Le matériel a été modifé avec succés');
        return redirect(route('materiel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materiel = Materiel::find($id);
        $this->authorize('delete', $materiel);
        $materiel->delete();
        session()->flash('supprimer','Le matériel a été supprimé avec succés');
        return redirect(route('materiel.index'));
    }

    public function search(Request $request)
    {
        if ($request->isMethod('post')){
            $page = false;

        $result = $request->input('search');
        $materiel = Materiel::where('nom','like',"%{$result}%")
        ->orWhere('model','like',"%{$result}%")
        ->orWhere('marque','like',"%{$result}%")
        ->orWhereHas('catMateriel', function ($query) use ($result) {
        $query->where('cat', 'like', "%{$result}%");
        })
        ->get();    
        return view('materiel.index')->with('materiel',$materiel)->with('page',$page);
            
        }
        return redirect(route('materiel.index'));
    }
}
