@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')


<div class="container" >
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3> Ajouter un matériel : </h3></u>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<hr>
			<form action="{{route('materiel.store')}}" method = "post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('nom')) has-error @endif">
					<label>Matériel</label>
					<input type="text" name="nom" class="form-control" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('nom'))
							{{$errors->first('nom')}}
						  @endif
					</span>
				</div>

				<div class="form-group">

					<label>Catégorie</label>

					@if(count($cat)>0)
					
					<select name = "cat" class="form-control">
						@foreach($cat as $ct)
						<option value="{{$ct->id}}">{{$ct->cat}}</option>
						@endforeach
					</select>
					
					@endif
					
				</div>

				<div class="form-group">
					<label>Image</label>
					<input type="file" name="image" class="form-control">
				</div>

				<div class="form-group">
					<label>Marque</label>
					<input type="text" name="marque" class="form-control" autocomplete="off">
				</div>

				<div class="form-group">
					<label>Model</label>
					<input type="text" name="model" class="form-control" autocomplete="off">
				</div>
				<div class="form-group">
					<center>
				<button  type="submit" name="submit" class="btn btn-primary ">
				<i class="fas fa-plus-square" style="margin-right: 5px"></i> Ajouter
				</button>
					</center>
				
				</div>
			</form>
		</div>
	</div>
</div>

@endsection