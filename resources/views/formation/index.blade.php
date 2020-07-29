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
				<u><h3>Liste des événements : </h3></u>
			</div>
	</div>

		<div class="row">

			<div class="col-md-12">
			
			<hr>
			<center>
				<form class="form-inline" action="{{route('formation.search')}}" method="post">
					{{csrf_field()}}
				<div class="form-group">
				<input type="text" name="search" class="form-control" placeholder="Tapez votre recherche" style="max-width: 200px" autocomplete="off" >
			</div>
				<button type="submit" name="submit" class="btn btn-primary btn-sm">
					<i class="fas fa-search" style="margin-right: 5px"></i>Rechercher
				</button>
				
			
			</form>
			</center>
		</div>
	</div>
			<hr>
			<div class="row">
	<div class="col-md-12 col-md-offset-0">

			<a href="{{route('formation.index')}}" class="btn btn-success btn pull-right btn-sm" style = "margin-bottom: 20px"><i class="fas fa-list" style="margin-right: 5px"></i>Lister tous</a>

	</div>
</div>

<div class="row">
	<div class="col-md-12 col-md-offset-0">

				<table class="table  table-hover table-bordered text-centered" >
					
					<thead>
						<th style="text-align: center;">Effectué</th>
						<th style="text-align: center;">Titre</th>
						<th style="text-align: center;">Date</th>

						<th style="text-align: center;" colspan="2">Actions</th>

						
					</thead>
					<tbody>
						@if(count($formation)>0)
							@foreach($formation as $f)
						<tr>
							<td > <center><input class = "form-check-check" type="checkbox"  name="effectue" value = "{{$f->effectue}}" {{$f->effectue?"checked":""}} /> </center> </td>
							<td  >{{$f->titre}}</td>
							<td style="text-align: center;">{{ date('d/m/Y', strtotime($f->date))}} à {{ date('G:i', strtotime($f->time)) }}</td>

							


						<td style ="text-align: center;">

	
							<a style  = "width: 100px"href="{{route('show_par',[$f->link,$f->id,'1'])}}" class="btn btn-info btn-sm" ><i class="fas fa-users" style="margin-right: 2px;"></i>Encadrants</a>

							

							<a style  = "width: 100px"href="{{route('show_par',[$f->link,$f->id,'0'])}}" class="btn btn-info btn-sm" ><i class="fas fa-users" style="margin-right: 2px;"></i>Participants</a>
							
							<a style  = "width: 100px"href="{{route('show_sal',$f->id)}}" class="btn btn-info btn-sm" ><i class="fas fa-door-closed" style="margin-right: 2px;"></i>Salles</a>

							<a style  = "width: 100px"href="{{route('show_mat',$f->id)}}" class="btn btn-info btn-sm" ><i class="fas fa-stethoscope" style="margin-right: 2px;"></i>Matériels</a>
					
							
								
						</td>
						

						<td style="text-align: center;" >
								<form action = "{{route('formation.destroy',$f->id)}}" method = "post"/>

								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}

							
							<a style  = "width: 90px" href="{{route('formation.show',$f->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye" style="margin-right: 2px"></i>Voir</a>
							<a style  = "width: 90px"href="{{route('formation.edit',$f->id)}}" class="btn btn-warning btn-sm" ><i class="fas fa-edit" style="margin-right: 2px"></i>Editer</a>
						
							<button type="submit" name="submit" class="btn btn-danger btn-sm " style="width: 90px">
								<i class="fas fa-trash-alt" style="margin-right: 2px;"></i>Supprimer
							</button>
							@if(Auth::user()->is_admin)
							<a style  = "width: 90px" href="{{route('formation.active',$f->id)}}" class="btn btn-default btn-sm"></i>
							@if($f->active)
							Désactiver
							@else
							Activer
							@endif
							</a>
							@endif
							
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