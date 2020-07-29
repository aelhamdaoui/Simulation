<html>
<head>


    <title>Rapport</title>
   
</head>
<body>
<style type="text/css">
	
	li{
		font-weight:normal;
		font-size: 14px;
		padding-bottom: 15px;
		line-height: 1.5; 

	}
	#left{
		text-align: left;
		width: 40%;
		font-size: 18px;
		font-weight: bold;
		letter-spacing: 2px;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-left: 20px;
	}
		
	table {
		float: right;
		margin-top: 40px;
  		width: 100%;
	}

	table, th, td {
  		 border: 1px solid black;

	}



  .page-break {
    page-break-after: always;
  }

  .header,
.footer {
    width: 100%;
    text-align: center;
    position: fixed;

}
.header {
    top: 0px;
    text-align: right;
}
.footer {
    bottom: 45px;
    font-size: 16px;
}
.pagenum:before {
    content: counter(page);
}



/** 
            * Set the margins of the PDF to 0
            * so the background image will cover the entire page.
            **/
            @page {
                margin: 0cm 0cm;
            }

            /**
            * Define the real margins of the content of your PDF
            * Here you will fix the margins of the header and footer
            * Of your background image.
            **/
            body {
                margin-top:    3.0cm;
                margin-bottom: 1cm;
                margin-left:   1cm;
                margin-right:  1cm;
            }

            /** 
            * Define the width, height, margins and position of the watermark.
            **/
            #watermark {
                position: fixed;
                bottom:   0px;
                left:     0px;
                /** The width and height may change 
                    according to the dimensions of your letterhead
                **/
                width:    21.4cm;
                height:   28cm;

                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }

            img{
            	float:right;
            }
            .rapport{

            	text-align: center;
            	font-size: 40px;
            	letter-spacing: 3px;
            	margin-top: 150px;
            	line-height: 100px
            }

            .titre{
            	font-weight: bold;
                font-size: 28px;
                text-align: center;
                margin-top: 10px;

                
            }
            .date{
            	margin-top: 30px;
            	line-height: 40px;
            	font-size: 20px;
            }
</style>

	
		<div id="watermark">
            <img src="{{public_path('logo_f.png')}}" />
        </div >

        <div class ="rapport">
        Rapport sur les formations effectués au centre de simulation entre {{date('d/m/Y', strtotime($from))}} et {{date('d/m/Y', strtotime($to))}}
    	</div>

        <div class="page-break"></div>

				@if(count($fr)>0)
				@foreach($fr as $f)

		 <div id="watermark">
            <img src="{{public_path('logo_f.png')}}" />
        </div>

        <main> 
           <div class="titre">Atelier : {{$f->titre}}</div>
        </main>
		

	  	<div class="date">Date de l'atelier : {{ date('d/m/Y', strtotime($f->date))}} à {{ date('G:i', strtotime($f->time)) }}<br>
	  	Durée de l'atelier : {{ date('G:i', strtotime($f->duree)) }}</div>
	  	
	  	
	  	<table border = 1>
	  		<tr>
	  			<td id = "left">
	  				Encadrants : 
	  			</td>
	  			<td>
	  				
	  					<ul>
	  					@foreach($f->participants as $par)
	  					@if($par->pivot->encadrant == 1)

	  					<li>
	  						{{$par->nom}} {{$par->prenom}} - @if($par->typeParticipant->id == 10)
							
							{{$par->statut}}
						@else
							{{$par->typeParticipant->type}}
						@endif
	  						
	  					</li>
	  					@endif
	  					@endforeach
	  					
	  					</ul>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td id = "left">
	  				Participants : 
	  			</td>
	  			<td>
	  				
	  					<ul>
	  					@foreach($f->participants as $par)
	  					@if($par->pivot->encadrant == 0)
	  					<li>

	  						{{$par->nom}} {{$par->prenom}} - @if($par->typeParticipant->id == 10)
							
							{{$par->statut}}
							@else
							{{$par->typeParticipant->type}}
							@endif  
	  						
	  						
	  					</li>
	  					@endif
	  					@endforeach
	  					
	  					</ul>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td id = "left">
	  				Materiels : 
	  			</td>
	  			<td>
	  				
	  					<ul>
	  					@foreach($f->materiels as $mat)
	  					<li>
	  						- 
	  						
	  						{{$mat->nom}}
	  						
	  					</li>
	  					@endforeach
	  					
	  					</ul>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td id = "left">
	  				Salles : 
	  			</td>
	  			<td>
	  				
	  					<ul>
	  					@foreach($f->salles as $sal)
	  					<li>
	  						- 
	  						
	  						{{$sal->nom}} 

	  					</li>
	  					@endforeach
	  					
	  					</ul>
	  			</td>
	  		</tr>
	  	</table>
  


  				


				

			<div class="footer">
				<hr>
			   Quartier Tilila BP 7519 Agence ABB Agadir Al Fidia CP 80060 Email : agadir.simulation@gmail.com
			</div>
	  			<div class="page-break"></div>

				@endforeach
				@endif



</body>
</html>