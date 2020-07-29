@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3> Ajouter un événement : </h3></u>
		</div>
	</div>

		<div class="col-md-6 col-md-offset-3">

			<hr>
			<form action="{{route('formation.store')}}" method = "post">
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('titre')) has-error @endif">
					<label>Titre</label>
					<input type="text" name="titre" class="form-control" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('titre'))
							{{$errors->first('titre')}}
						  @endif
					</span>
				</div>
				<div class="form-group  @if($errors->has('date')) has-error @endif">
					<label>Date</label>
					
					<input placeholder="" name = "date" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('date'))
							{{$errors->first('date')}}
						  @endif
					</span>
				</div>

				<div class="form-group  @if($errors->has('time')) has-error @endif">
				<label for="appt-time">Heure de début de l'atelier (H:mm)</label>
				<input class = "form-control"id="appt-time" type="time" name="time" >
				<span class="help-block">
						  @if ($errors->has('time'))
							{{$errors->first('time')}}
						  @endif
					</span>
				</div>

				<div class="form-group  @if($errors->has('duree')) has-error @endif">
				<label for="appt-time">Durée de l'atelier (H:mm)</label>
				<input class = "form-control"id="appt-time" type=time name="duree" >
				<span class="help-block">
						  @if ($errors->has('duree'))
							{{$errors->first('duree')}}
						  @endif
					</span>
				</div>


				<div class="form-group">
					<label>Description (optionnel)</label>
					<textarea name="description" class="form-control"></textarea>
					
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
	
@endsection