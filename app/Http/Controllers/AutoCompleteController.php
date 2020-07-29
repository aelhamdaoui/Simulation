<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Type_participant;

class AutoCompleteController extends Controller
{
    function index()
    {
     return view('autocomplete');
    }

    function fetch($query)
    {
      $data = Participant::where('nom', 'LIKE', "%{$query}%")
      ->orWhere('prenom','LIKE',"%{$query}%")
      ->get();
      
      $count = $data->count();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative;float:none">';

      if($count>0 && strlen($query)>1)
      {
        foreach($data as $row)
        {
        $output .= '
        <li class = "ll"><a href="#">'.$row->id.' - '.$row->nom.' '. $row->prenom. ' - '.$row->typeParticipant->type.'</a></li>
         ';
        }
        $output .= '</ul>';

        
      }
      else
      {
        $output .= '
        <li "><a href="#">Pas de résultats</a></li>
         ';
        
        $output .= '</ul>';
      }

    echo $output;
      
    }
}
