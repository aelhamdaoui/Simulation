@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                               
@section('content')


<div class="container" >

	<div class="row" >
		<div class="col-md-6 col-md-offset-3">
		@section('message')
		@include('layouts.message')

		@endsection
		</div>
	</div>

	<div class="row" >
		
		<div class="col-md-6 col-md-offset-3">
			@if($enc == 1)
<u><h3> Ajouter un encadrant : </h3></u>
			@else
<u><h3> Ajouter un participant : </h3></u>
			@endif
		</div>
	</div>

			
<form action="{{route('store_par.post',[$formation->link,$formation->id,$enc])}}" method = "post">

				{{csrf_field()}}

	<div class="row" >
		
		<div class="col-md-6 col-md-offset-3">

			
			<br>


				<div class="form-group" >
					<label>Type :</label>
					
					<select id = "select" name = "type" class="form-control">
						<option selected="">Choisir le type</option>
						@foreach($type as $t)
						<option value="{{$t->id}}">{{$t->type}}</option>
						@endforeach
					</select>
					
				</div>
			</div>
		</div>

		<div class="row" >
		
		<div class="col-md-6 col-md-offset-3">

<div id = "fmpa">
   		<label>Nom et prénom :</label>
 			  <div class="form-group">
    		<input type="text" name="nom" id="nom" class="form-control @if($errors->has('nom')) has-error @endif" placeholder="Entrez Nom ou Prénom" autocomplete="off"/>
   			<div  id="list"></div>

   		</div>
   		<input type = "hidden" name = "nom1" id = "nom1" >
   	</div>
   </div>
</div>
		<div class="row" >
		
		<div class="col-md-6 col-md-offset-3">
   		<div id = "autre">

   		<div class="form-group ">
					<label class="control-label" for="nom">Nom (obligatoire)</label>
					<input type="text" name="nom2" class="form-control" id = "nom2" autocomplete="off" >
					
					
				</div>
				<div class="form-group ">
					<label class="control-label" for="prenom">Prénom (obligatoire)</label>
					<input type="text" name="prenom" class="form-control" id = "prenom" autocomplete="off">

					
				</div>
				<div class="form-group ">
					<label>CIN (obligatoire)</label>
					<input type="text" name="cin" class="form-control" autocomplete="off">



				</div>

				<div class="form-group" id="statut">
					<label>Statut (obligatoire)</label>
					<input type="text" name="statut" class="form-control" autocomplete="off">
				</div>

			
			
				<div class="form-group" >
					<label>Sexe</label>
					<select name="sexe" class="form-control">
						<option value = "M">M</option>
						<option value = "F">F</option>
					</select>
				
				</div>
					
					
				<div class="form-group">
					<label>Date de naissance </label>
					
					<input placeholder="" name = "naissance" class="textbox-n form-control" type="text" onfocus="(this.type='date')" id="date" autocomplete="off">
				</div>

				</div>

			</div>
		</div>
   			

   	
					
					@if($enc == 1)
					<input class = "form-check-check"type="hidden" name="encadrant" value="1"/> 
					@else
					<input class = "form-check-check"type="hidden" name="encadrant" value="0"/> 
					@endif
				<br>

				
				<center>
				<div class="form-group">
				<button  type="submit" name="submit" class="btn btn-primary ">
					<i class="fas fa-plus-square" style="margin-right: 5px"></i> Ajouter
				</button>
				</div>
				</center>


			</form>
		</div>


<script>
	
$(document).ready(function(){

$("#fmpa").hide();
$("#autre").hide();
$(".form-check").hide();
$("input[name='submit']").hide();

 $('#nom').keyup(function(){ 
 	var query = $(this).val();
 	
 	var url = "{{url('fetch')}}" + "/" + query.toString() ;
        
        if(query != '')
        {
       
         $.ajax({

          url:url,
		  type:'GET',
 
          success:function(data){

          	if(data.length>0)
    			{
   		

          	 $('#list').fadeIn();
             $('#list').html(data);
    		}
    	}
    });
}
});
 $(document).on('click', 'li.ll', function(){  
        $('#nom').val($(this).text());
        var x = $('#nom').val();
        
        var firstIndex = x.indexOf("-");
		var x = x.substr(0, firstIndex-1);
 		$('#nom1').val(x);

        $('#list').fadeOut();

    });  

$("#select").change(function(e){
  	var x = $("#select option:selected").val();
  	if(x >= 5)
  	{
  		if(x == 10)
  		{
  			$("#statut").show();
  		}
  		else
  		{
  			$("#statut").hide();
  		}
  		$("#fmpa").hide();
  		$("#autre").show();
  		$(".form-check").show();
		$("input[name='submit']").show();
  	}
  	else
  	{
  		$("#fmpa").show();
  		$("#autre").hide();
  		$(".form-check").show();
		$("input[name='submit']").show();
  	}
  });

});
</script>


@endsection