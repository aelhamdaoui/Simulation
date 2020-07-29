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
				<u><h3>Liste des Matériels : </h3></u>
			</div>
	</div>

	<div class="row">
			<center>
				<form class="form-inline" action="{{route('materiel.search')}}" method="post">
					{{csrf_field()}}
					<div class="col-md-12">
				<div class="form-group">
				<input type="text" name="search" class="form-control " placeholder="Tapez votre recherche" autocomplete="off">
			</div>
				<button type ="submit" name = "submit" class="btn btn-primary btn-sm"  >
			<i class="fas fa-search" style="margin-right: 5px"></i>Rechercher
			</button>
			
			</div>
			</form>
			</center>
		</div>
			<hr>

			<div class="row">
			<div class="col-md-8 col-md-offset-2">

			<a href="{{route('materiel.index')}}" class="btn btn-success btn pull-right btn-sm" style = "margin-bottom: 20px"><i class="fas fa-list" style="margin-right: 5px"></i> Lister tous</a>
		</div>
	</div>

	<div class="row">
	<div class="col-md-8 col-md-offset-2">
				<table class="table  table-hover table-bordered ">
					
					<thead>
						<th>Matériel</th>
						<th>Catégorie</th>
						<th>Marque</th>
						
						<th style="text-align: center;">Actions</th>
					</thead>
					<tbody>
						<tr>
							@if(count($materiel)>0)
							@foreach($materiel as $mat)

							<td>{{$mat->nom}}</td>
							<td>{{$mat->catMateriel->cat}}</td>
							<td>{{$mat->marque}}</td>
							<td style="text-align: center;vertical-align: middle;">
								<form action = "{{route('materiel.destroy',$mat->id)}}" method = "post"/>

								<input type="hidden" name="_method" value="DELETE">
								{{csrf_field()}}
							<a style  = "width: 95px" href="{{route('materiel.show',$mat->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye" style="margin-right: 5px"></i>Afficher</a>
							@can('delete',$mat)
							<a style  = "width: 95px" href="{{route('materiel.edit',$mat->id)}}" class="btn btn-warning btn-sm" ><i class="fas fa-edit" style="margin-right: 5px"></i>Editer</a>
							@endcan
							@can('delete',$mat)
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
		<div class="row">
			<div class="col-md-4 col-md-offset-4 ">
			<center>
			@if($page == true)

			{{$materiel->links()}}

			@endif
			</center>
		
			</div>
	</div>
</div>

@endsection