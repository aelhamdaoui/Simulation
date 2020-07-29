
@if($errors->any())

<div class="alert alert-danger" role="alert">
	
<ul style="list-style-type:none;">

réessayer à nouveau
	@foreach($errors->all() as $error)
	
	<li>
		- {{$error}}
	</li>

	@endforeach
	

</ul> 
 

</div>
 @endif

 @if($errors->get('nom'))
 @foreach($errors->get('nom') as $error)

		{{$error}}
	  
	@endforeach
 @endif



@if(session()->has('ajouter'))
<div style="opacity: 0.6;text-align: center" class="alert alert-success" role="alert">
<i class="fas fa-check-square" style="margin-right: 10px"></i>
{{session()->get('ajouter')}}
</div>
@elseif(session()->has('modifier'))
<div style="opacity: 0.6;text-align: center" class="alert alert-warning" role="alert">
<i class="fas fa-exclamation-circle" style="margin-right: 10px"></i>
{{session()->get('modifier')}}
</div>
@elseif(session()->has('supprimer'))
<div style="opacity: 0.6;text-align: center;"class="alert alert-danger" role="alert">
<i class="fas fa-times" style="margin-right: 10px"></i>
{{session()->get('supprimer')}}
</div>
@endif

