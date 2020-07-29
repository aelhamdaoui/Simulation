@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')

	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">

<div class="well well-sm" style="font-size: 14px ;letter-spacing: 2px">
  Titre de formation : {{$formation->titre }}
</div>
<div class="well well-sm" style="font-size: 14px ;letter-spacing: 2px">
  Date de formation : {{$formation->date}}
</div>

			</div>
		</div>

			<hr>
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p class="lead"><u><h3>Liste des matériels : </h3></u></p>

			<a style = "margin-bottom: 20px" href="{{route('create_mat',$formation->id)}}" class="btn btn-success btn-sm pull-right"><i class="fas fa-plus-square" style="margin-right: 5px"></i>Ajouter un materiel</a>
				<table class="table  table-hover table-bordered text-centered" >
					
					<thead>
						<th style="text-align: center;">materiel</th>
						<th style="text-align: center;" >catégorie</th>
						<th style="text-align: center;">Actions</th>

						
					</thead>
					<tbody>
						@foreach($formation->materiels as $materiel)
						<tr>
							
							<td > {{$materiel->nom}}  </td>


							<td >{{$materiel->catMateriel->cat}}</td>
						

						<td style="text-align: center;" >

							<a style  = "width: 90px" href="{{route('delete_mat',[$materiel->id,$formation->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="margin-right: 5px"></i>Supprimer</a>

						</td>


						</tr>
						@endforeach

					</tbody>
					
				</table>
			</div>
		</div>

		<center>

			<div class="col-md-8 col-md-offset-2">
					
					<a href="{{route('formation.index')}}" class="btn btn-primary " style = "margin-bottom: 20px"><i class="fas fa-undo-alt" style="margin-right: 5px"></i>Retour</a>
			</div>
		</center>
		</div>


@endsection