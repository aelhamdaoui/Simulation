@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3>Modifier une salle </h3></u>
		</div>
	</div>

	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">

			<hr>
			<form action="{{route('salle.update',$salle->id)}}" method = "post">
				<input name="_method" type="hidden" value="PUT">
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('nom')) has-error @endif">
					<label>Nom</label>
					<input type="text" name="nom" class="form-control" value="{{$salle->nom}}" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('nom'))
							{{$errors->first('nom')}}
						  @endif
					</span>
				</div>
				
				<div class="form-group">
				<input type="submit" name="submit" value="Modifier" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection