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
				<u><h3>Liste des Salles : </h3></u>
			</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<hr>
			<a href="{{route('salle.create')}}" class="btn btn-success btn-sm pull-right" style = "margin-bottom: 20px"><i class="fas fa-plus-square" style="margin-right: 5px"></i>Ajouter une salle</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<table class="table  table-hover table-bordered ">
					
					<thead>
						<th style="text-align: center;vertical-align: middle;" >Photo</th>
						<th style="text-align: center;vertical-align: middle;">La salle</th>

						<th style="text-align: center;">Actions</th>
					</thead>
					<tbody>
						@if(count($salle)>0)
							@foreach($salle as $sl)
						<tr>
							<td style="text-align: center;vertical-align: middle;"><img src="{{asset('storage/images/salle.jpg')}}"></td>
							<td style="text-align: center;vertical-align: middle;" >{{$sl->nom}}</td>

							<td style="text-align: center;vertical-align: middle;">
								<form action = "{{route('salle.destroy',$sl->id)}}" method = "post"/>

								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
							<a href="" style  = "width: 95px" class="btn btn-primary btn-sm"><i class="fas fa-eye" style="margin-right: 5px"></i>Voir</a>
							@can('delete',$sl)
							<a href="{{route('salle.edit',$sl->id)}}" style  = "width: 95px" class="btn btn-warning btn-sm" ><i class="fas fa-edit" style="margin-right: 5px"></i>Editer</a>
							@endcan
							@can('delete',$sl)
							<button  type="submit" name="submit" class="btn btn-danger btn-sm" style  = "width: 95px">
							<i class="fas fa-trash-alt" style="margin-right: 5px"></i> Supprimer
							</button>	
							@endcan
								</form>
						</td>
						

						</tr>
							@endforeach
						@endif
					</tbody>
					
				</table>


	</div>
		</div>
		</div>

@endsection