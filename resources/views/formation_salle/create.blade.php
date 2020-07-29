@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')


<div class="container" >
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<u><h3> Ajouter une salle : </h3></u>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
<hr>

			<form action="{{route('store_sal.post',$formation->id)}}" method = "post">

				{{csrf_field()}}
				

				

				<div class="form-group">
					<label>Salle :</label>
					<select id = "select" name = "nom" class="form-control">
						<option selected="">Choisir une salle</option>
						@foreach($salle as $s)
						<option value="{{$s->id}}">{{$s->nom}}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
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