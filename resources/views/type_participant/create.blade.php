@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3>Ajouter un type de participant : </h3></u>
		</div>
	</div>

	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<hr>

			<form action="{{route('typeparticipant.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('type')) has-error @endif">
					<label>type</label>
					<input type="text" name="type" class="form-control" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('type'))
							{{$errors->first('type')}}
						  @endif
					</span>
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