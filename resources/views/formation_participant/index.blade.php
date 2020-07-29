@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                
@section('content')

<div class="container">

@if(!$formation->active and Auth::guest())

	<div class="row" style="margin-top: 40px">
		<div class="col-md-6 col-md-offset-3">
			<h3> Opération non autorisée !!</h3>
		</div>
	</div>

@else
	<div class="row">

	<div class="col-md-8 col-md-offset-2">

<div class="well well-sm" style="font-size: 14px ;letter-spacing: 2px">
  Titre de formation : {{$formation->titre }}
</div>
<div class="well well-sm" style="font-size: 14px ;letter-spacing: 2px">
  Date de formation : {{$formation->date}}
</div>

@if($enc == 0 && (!Auth::guest()))
<center><button id="show" class="btn-defalut btn-sm">Afficher le lien</button></center>
<br>

<div id="box"class="well well-sm" style="font-size: 14px ;letter-spacing: 2px;max-width: 100%;word-wrap:break-word;">
 {{route('show_par',[$formation->link,$formation->id,$enc])}}
			</div>

			<hr>

@endif


	<div class="row">
				

			<div class="col-md-8 col-md-offset-2">
				@if($enc == 1)
				<p class="lead"><u><h3>Liste des encadrants : </h3></u></p>
				
			<a style = "margin-bottom: 20px" href="{{route('create_par',[$formation->link,$formation->id,$enc])}}" class="btn btn-success btn-sm pull-right" style = "margin-bottom: 20px"><i class="fas fa-plus-square" style="margin-right: 5px"></i>Ajouter un encadrant</a>
				@else
				<p class="lead"><u><h3>Liste des participants : </h3></u></p>
				
							

			<a style = "margin-bottom: 20px" href="{{route('create_par',[$formation->link,$formation->id,$enc])}}" class="btn btn-success btn-sm pull-right" style = "margin-bottom: 20px"><i class="fas fa-plus-square" style="margin-right: 5px"></i>Ajouter un participant</a>
				@endif
				<table class="table  table-hover table-bordered text-centered" >
					
					<thead>
						<th style="text-align: center;vertical-align: middle;">Nom et prenom</th>
						<th style="text-align: center;vertical-align: middle;">Statut</th>
						@if($enc == 0 && (!Auth::guest()))
						<th style="text-align: center;">Actions</th>
						@endif
						

					</thead>
					<tbody>
						@foreach($formation->participants as $participant)
						<tr>
							@if($participant->pivot->encadrant and $enc == 1)
							<td > 
								
								{{$participant->nom}} {{$participant->prenom}} 
								
							
							</td>


							<td >
						@if($participant->typeParticipant->id == 10)
							
							{{$participant->statut}}
						@else
							{{$participant->typeParticipant->type}}
						@endif
							</td>
							

						<td style="text-align: center;" >


							<a style  = "width: 95px" href="{{route('delete_par',[$formation->link,$participant->id,$formation->id,$enc])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="margin-right: 5px"></i> Supprimer</a>


						</td>

						@elseif(!($participant->pivot->encadrant) and $enc == 0)
							<td > 
								
								{{$participant->nom}} {{$participant->prenom}} 
								
							
							</td>


							<td >
						@if($participant->typeParticipant->id == 10)
							
							{{$participant->statut}}
						@else
							{{$participant->typeParticipant->type}}
						@endif
							</td>
							
						@if(!Auth::guest())
						<td style="text-align: center;" >
						
							<a style  = "width: 95px" href="{{route('delete_par',[$formation->link,$participant->id,$formation->id,$enc])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="margin-right: 5px"></i> Supprimer</a>


						</td>
						@endif
							@endif
						</tr>
						@endforeach

					</tbody>
					
				</table>


	</div>
		</div>
		<center>
			<div class="col-md-8 col-md-offset-2">
					@if(!Auth::guest())
					<a href="{{route('formation.index')}}" class="btn btn-primary  " style = "margin-bottom: 20px"><i class="fas fa-undo-alt" style="margin-right: 5px"></i>Retour</a>
					@endif
			</div>
		</center>
		</div>
	</div>

<script>
	
$(document).ready(function(){

$("#box").hide();

 $('#show').click(function(){ 
 	
$("#box").show();

});




});
</script>
@endif
@endsection