@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection
                   
@section('content')


<div class="container" >
	<div class="row" >
		
		<div class="col-md-6 col-md-offset-3">
<u><h3> Ajouter un matériel : </h3></u>
		</div>
	</div>
			<br>
			<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<form action="{{route('store_mat.post',$formation->id)}}" method = "post">

				{{csrf_field()}}
				

				<div class="form-group" >
					<label>Categorie :</label>
					
					<select id = "select" name = "type" class="form-control">
						<option selected="">Choisir le type</option>
						@foreach($type as $t)
						<option value="{{$t->id}}">{{$t->cat}}</option>
						@endforeach
					</select>
					
				</div>

				<div class="form-group">
					<label>Matériel :</label>
					<select name = "nom" class="form-control">
					</select>
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


<script>
$(document).ready(function(){

  $("#select").change(function(e){
  	var x = $("#select option:selected").val();

  	var url = "{{url('selectmateriel')}}" + "/" + x.toString();
  		
		$.ajax(
		{
			url:url,
			type:'GET',

			success:function(data){


                 $("select[name=nom]").empty();      

    			$("select[name=nom]").append('<option>Choisir un matériel</option>');
    			if(data.length>0)
    			{
    			$.each(data,function(index,element){
                        $("select[name=nom]").append('<option value="'+element.id+'">'+element.nom+'</option>');
                    });
    			}else
    			{
    				$("select[name=nom]").empty(); 
    			}
                }


  })
});
});
</script>

@endsection