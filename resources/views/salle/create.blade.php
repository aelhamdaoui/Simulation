@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Ajouter une salle  </h3>
			<hr>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">	
			
			<form action="{{route('salle.store')}}" method = "post">
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('nom')) has-error @endif">
					<label>Salle</label>
					<input type="text" name="nom" class="form-control" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('nom'))
							{{$errors->first('nom')}}
						  @endif
					</span>
				</div>
				
				
				<div class="form-group">
					<center>
				<button type="submit" name="submit"  class="btn btn-primary">
				<i class="fas fa-plus-square" style="margin-right: 5px"></i>Ajouter
				</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection