@extends('layouts.app')

@section('menu')
@include('layouts.menu')                 
@endsection

@section('content')

<div class="container" >
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3> Ajouter un participant : </h3></u>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<hr>

			<form action="{{route('participant.store')}}" method = "post" enctype="multipart/form-data">
				
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('nom')) has-error @endif">
					<label class="control-label" for="nom">Nom</label>
					<input type="text" name="nom" class="form-control" id = "nom" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('nom'))
							{{$errors->first('nom')}}
						  @endif
					</span>
				</div>
				<div class="form-group  @if($errors->has('prenom')) has-error @endif">
					<label class="control-label" for="prenom">Prénom</label>
					<input type="text" name="prenom" class="form-control" id = "prenom" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('prenom'))
							{{$errors->first('prenom')}}
						  @endif
					</span>
				</div>
				<div class="form-group">

					<label>Type</label>

					@if(count($type)>0)
					
					<select name = "type" class="form-control">
						@foreach($type as $ty)
						<option value="{{$ty->id}}">{{$ty->type}}</option>
						@endforeach
					</select>
					
					@endif
					
				</div>

				<div class="form-group">
					<label>Image (optionnel)</label>
					<input type="file" name="image" class="form-control">
				</div>
			

					<div class="form-group" >
					<label>Sexe </label>
					<select name="sexe" class="form-control">
						<option value = "M">M</option>
						<option value = "F">F</option>
					</select>
				
				</div>
					<div class="form-group">
					<label>CIN (optionnel)</label>
					<input type="text" name="cin" class="form-control" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Date de naissance (optionnel)</label>
					
					<input placeholder="" name = "naissance" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date" autocomplete="off">
				</div>

				<center>
				<div class="form-group">
				<button  type="submit" name="submit" class="btn btn-primary ">
					<i class="fas fa-plus-square" style="margin-right: 5px"></i> Ajouter
				</button>
				</div>
				</center>
			</form>
		</div>
	</div>
</div>

@endsection