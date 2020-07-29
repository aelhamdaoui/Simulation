@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')

<div class="container">
	<div class="row" >
			<div class="col-md-6 col-md-offset-3">
			@include('layouts.message')
			</div>
	</div>
	<div class="row">
			<div class="col-md-8 col-md-offset-0 " >
				<u><h3>Liste des participants : </h3></u>
			</div>
	</div>
	<div class="row">
		
			<form class="form-inline" action="{{route('participant.search')}}" method="post">
					{{csrf_field()}}
					<center>
					<div class="col-md-12">
			<div class="form-group" >
			<input type="text" name="search" class="form-control" placeholder="Tapez votre recherche" style="max-width: 200px" autocomplete="off" >
			</div>			
			<button type ="submit" name = "submit" class="btn btn-primary btn-sm"  >
			<i class="fas fa-search" style="margin-right: 5px"></i>Rechercher
			</button>
					</div>
					</center>
			</form>
	</div>

<hr>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<a href="{{route('participant.index')}}" class="btn btn-success btn pull-right btn-sm" style = "margin-bottom: 20px"><i class="fas fa-list" style="margin-right: 5px"></i> Lister tous</a>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">

	<table class="table  table-hover table-bordered ">				
		<thead>
			<th style="text-align: center">Photo</th>
			<th style="text-align: center">Nom et prénom</th>
			<th style="text-align: center">Type</th>
			<th style="text-align: center;">Actions</th>
		</thead>
		<tbody>
			<tr>
				@if(count($participant)>0)
				@foreach($participant as $par)
			<td style="text-align: center"><img src="{{asset('storage/' .$par->image)}}"></td>
			<td style="vertical-align: middle;">{{$par->nom}} {{$par->prenom}}</td>
			<td style="vertical-align: middle;">{{$par->typeParticipant->type}}</td>
			<td style="text-align: center;vertical-align: middle;">
			<form action = "{{route('participant.destroy',$par->id)}}" method = "post"/>
			<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
			<a href="{{route('participant.show',$par->id)}}" style  = "width: 95px" class="btn btn-primary btn-sm"><i class="fas fa-eye" style="margin-right: 5px"></i>Voir</a>
			<a href="{{route('participant.edit',$par->id)}}" style  = "width: 95px" class="btn btn-warning btn-sm" ><i class="fas fa-edit" style="margin-right: 5px"></i>Editer</a>
			<button  type="submit" name="submit" class="btn btn-danger btn-sm" style  = "width: 95px">
			<i class="fas fa-trash-alt" style="margin-right: 5px"></i> Supprimer
			</button>					
			</form>
			</td>
			</tr>
						
			@endforeach
			@endif
			</tbody>	
		</table>

	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-4 ">
			@if($page == true)

			{{$participant->links()}}

			@endif
	</div>
</div>
</div>
@endsection
		