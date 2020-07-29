@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-6 col-md-offset-3">
			<h3>Chercher </h3>
			<hr>

			<div class="panel panel-primary">
  				<div class="panel-heading"><b>Entrez la date de début et de fin </b></div>
  				<div class="panel-body">
  					

  					<form action="{{route('formation.rapport')}}" method = "post">
						{{csrf_field()}}
					<div class="form-group">
					<label>Entrez la date de début</label>
					
					<input placeholder="" name = "from" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date">
					</div>
					<div class="form-group">
					<label>Entrez la date de fin</label>
					
					<input placeholder="" name = "to" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date">
					</div>
				
					<div class="form-group">
					<input type="submit" name="submit" value="Valider" class="btn btn-primary" id="btn">
					</div>
					</form>


  				</div>
				</div>

			
		</div>
	</div>
</div>
	


@endsection