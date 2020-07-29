@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')


	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
			
			</div>
			
			<div class="col-md-8 col-md-offset-2">
				
				@if($formation)

				<div class="panel panel-primary">
  				<div class="panel-heading"><b>Atelier : {{$formation->titre}} </b></div>
  				<div class="panel-body">
  					<div class="pull-left">
  						Date : {{ date('d/m/Y', strtotime($formation->date))}} à {{ date('G:i', strtotime($formation->time)) }}
  					</div>
  					<br><br>
              <hr>
              <h4><b>Encadrants :</b></h4>
              @if(count($formation->participants)>0)
              @foreach($formation->participants as $par)
            <ul>
              @if(($par->pivot->encadrant == 1 and Auth::user()->is_admin)) 
              <li style="line-height: 2.2;">
                
                
                {{$par->nom}} {{$par->prenom}}
           

            <a href="{{route('formation.certificate',[$formation->id,$par->id,$par->pivot->encadrant])}}" class="btn btn-primary btn-sm pull-right" style = "margin-right: 30px"><i class="fa fa-print" aria-hidden="true" style="margin-right: 5px;"></i>
Attestation </a>
           
                

              </li>
              @endif
            </ul>
            
              @endforeach
              @endif
  						<hr>
  						<h4><b>Participant :</b></h4>
  						@if(count($formation->participants)>0)
  						@foreach($formation->participants as $par)
  					<ul>
              @if($par->pivot->encadrant == 0)
  						<li style="line-height: 2.2;">
  							

                
                {{$par->nom}} {{$par->prenom}}

                  <a href="{{route('formation.certificate',[$formation->id,$par->id,$par->pivot->encadrant])}}" class="btn btn-primary btn-sm pull-right" style = "margin-right: 30px"><i class="fa fa-print" aria-hidden="true" style="margin-right: 5px;"></i>
Attestation </a>

  						</li>
              @endif
  					</ul>
  					
  						@endforeach
  						@endif
  						<hr>
  						<h4><b>Matériels :</b></h4>
  						@if(count($formation->materiels)>0)
  						@foreach($formation->materiels as $mat)
  					<ul>
  						<li>
  							{{$mat->nom}} 
  						</li>
  					</ul>

  						@endforeach
  						@endif
  						<hr>
  						<h4><b>Salles :</b></h4>
  						@if(count($formation->salles)>0)
  						@foreach($formation->salles as $sal)
  					<ul>
  						<li>
  							{{$sal->nom}} 
  						</li>
  					</ul>
  						@endforeach
  						@endif


  					
  					
  					<hr>
  					
  					
  					
  				</div>
				</div>
				
				@endif
			</div>
			
			</div>
			<div class="col-md-8 col-md-offset-2">
					
					<a href="{{route('formation.index')}}" class="btn btn-primary btn-sm pull-left" style = "margin-bottom: 20px">Retour</a>
			</div>

	
	
		</div>


@endsection