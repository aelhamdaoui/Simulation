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
				
				@if(count($materiel)>0)

				<div class="panel panel-primary">
  				<div class="panel-heading " style="font-size: 18px"><b>Matériel : {{$materiel->nom}} </b></div>
  				<div class="panel-body" style="font-size: 16px ;letter-spacing: 2px">
  					<div class="pull-right">
  						<img src="{{asset('storage/' .$materiel->image)}}" height="200px" width="200px">
  					</div>
  					- Marque : {{$materiel->marque}}
  					<hr>
  					- Model : {{$materiel->model}}
  					<hr>
  					- Categorie  : {{$materiel->catMateriel->cat}}

  				</div>
				</div>
				
				@endif
			</div>
			
			</div>
		
		</div>

@endsection