<html>
    <head>
        <title>Attestation {{$par->nom}} {{$par->prenom}}</title>
        <style>
            
            @page {
                margin: 0cm 0cm;
            }

            
            body {
                margin-top:    2.2cm;
                margin-bottom: 1cm;
                margin-left:   1cm;
                margin-right:  1cm;
            }

           
            #watermark {
                position: fixed;
                bottom:   0px;
                left:     0px;
                
                width:    29.7cm;
                height:   21.0cm;

                
                z-index:  -1000;
            }

            .text {
                
                margin-top: 45px;
                margin-bottom: 50px;
                margin-left: 35px;
                margin-right: 35px;
                line-height: 50px;
                font-size: 26px;
            }

            .titre{
                font-weight: bold;
                margin-top: 150px;
                font-size: 50px;
                text-align: center;
            }
            .participant{
                margin-top: 30px;
                font-size: 30px;
                text-align: center;
            }
            .nom{
                font-weight: bold;
                margin-top: 30px;
                font-size: 35px;
                text-align: center;
                letter-spacing: 4px;
            }

            .bold{
                font-weight: bold;
                font-size: 28px;
                text-transform: lowercase;
                
            }

            .float-left {
            
            float:left;
            width:31%; 
            font-size: 25px;
            line-height: 35px;
            }

        </style>
    </head>
    <body>
        <div id="watermark">
            <img src="{{public_path('wallpaper.png')}}" height="100%" width="100%" />
        </div>

        <main> 
            <div align="center" class="float-left"> <img height = "120px" width = "220px"src="{{public_path('logo.jpg')}}"/> </div>
            <div align="center"class="float-left"></div>
            <div align="center" class="float-left"><img height = "120px" width = "340px"src="{{public_path('logo_f.png')}}"/></div>


            @if($enc == 0)

            <div class="titre">Attestation de participation</div>
            <div class="participant">délivré à</div>
            <div class="nom">{{$par->nom}} {{$par->prenom}}</div>
            <div class="text"> Pour sa participation à la formation <bold class="bold"><i>{{$fr->titre}}</i></bold> organisée au centre de simulation 
                au sein de la Faculté de Médecine et de Pharmacie d'Agadir.</div>

            @else


            <div class="titre">Attestation d'encadrement</div>
            <div class="participant">délivré à</div>
            <div class="nom">{{$par->nom}} {{$par->prenom}}</div>
            <div class="text"> Pour son encadrement la formation <bold class="bold"><i>{{$fr->titre}}</i></bold> organisée au centre de simulation 
                au sein de la Faculté de Médecine et de Pharmacie d'Agadir.</div>


            @endif

            <div align="center" class="float-left">Date <br> {{ date('d/m/Y', strtotime($fr->date))}} </div>

            
        </main>
    </body>
</html>