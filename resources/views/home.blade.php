@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')

<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2 " align="center">

            <div class="">

                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  
            <img src="{{asset('simulation.jpg')}}" width="100%" height="100%" class=" img-fluid img-thumbnail " align="center" />
                  
                   
                    <!--You are logged in!-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
