@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')


	<div class="container">
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
				
				@if(count($participant)>0)

				<div class="panel panel-primary">
  				<div class="panel-heading" style="font-size: 18px">Participant : {{$participant->nom}} {{$participant->prenom}}</div>
  				<div class="panel-body" style="font-size: 16px ;letter-spacing: 2px">
  					<div class="pull-right">
  						<img src="{{asset('storage/' .$participant->image)}}" height="120px" width="120px">
  					</div>
  					- Type : {{$participant->typeParticipant->type}}
  					<hr>
  					- CIN : {{$participant->cin}}
  					<hr>
  					- Date de naissance : {{$participant->naissance}}
  					<hr>
  					- Sexe : {{$participant->sexe}}
  				</div>
				</div>

				<div class="panel panel-primary">
  				<div class="panel-heading" style="font-size: 18px">Formations : ({{count($participant->formations)}})</div>
  				<div class="panel-body" style="font-size: 16px ;letter-spacing: 2px">
  					
  					@foreach($participant->formations as $formation)
  					- Titre : {{$formation->titre}} <br> <br>
  					- Date : 
  					{{$formation->date}}<br><br>
           

            @if($formation->pivot->encadrant == 1)
            - Etat : Encadrant
            @else 
            - Etat : Participant
            @endif
  					<br><br>
             - Effectué : 
            @if($formation->effectue ==0)
            non
            @else
            oui
            @endif
            <hr>
  					@endforeach
  					
  				</div>
				</div>
				
				@endif
			</div>
			
			</div>
		
		</div>


@endsection