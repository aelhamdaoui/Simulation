@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3>Modifier un participant : </h3></u>
		</div>
	</div>

	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">
			
			
			<hr>
			<form action="{{route('participant.update',$participant->id)}}" method = "post" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PUT">
				{{csrf_field()}}
				<div class="form-group  @if($errors->has('nom')) has-error @endif">
					<label>Nom</label>
					<input type="text" name="nom" class="form-control" value="{{$participant->nom}}" autocomplete="off">
					<span class="help-block">
						  @if ($errors->has('nom'))
							{{$errors->first('nom')}}
						  @endif
					</span>
				</div>
				<div class="form-group  @if($errors->has('prenom')) has-error @endif">
					<label>Prenom</label>
					<input type="text" name="prenom" class="form-control" value="{{$participant->prenom}}" autocomplete="off">
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

						@if($ty->id == $participant->typeParticipant->id)

						<option selected value="{{$ty->id}}">{{$ty->type}}</option>
						@else 
						<option  value="{{$ty->id}}">{{$ty->type}}</option>
						@endif
						@endforeach
					</select>
					
					@endif
					
					</div>

					<div class="form-group">
					<label>Image (optionnel)</label>
					<input type="file" name="image" class="form-control">
				</div>
				
					<div class="form-group">
					<label>CIN (optionnel)</label>
					<input type="text" name="cin" class="form-control" value="{{$participant->cin}}" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Date de naissance (optionnel)</label>
					
					<input placeholder="" name = "naissance" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date" value="{{$participant->naissance}}" autocomplete="off">
				</div>

				<div class="form-group">
					<center>
			<button type="submit" name="submit" class="btn btn-primary">
			<i class="fas fa-edit" style="margin-right: 5px"></i>Modifier
			</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection