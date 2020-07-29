
@if(Auth::user())

       <ul class="nav navbar-nav" style="margin-left: 30px">
                        
                        @if(Auth::user()->is_admin) 

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Participants <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('participant.index')}}">
                                            Afficher les participants
                                        </a>
                                     </li>
                                    <li>
                                        <a href="{{route('participant.create')}}">
                                            Ajouter un participant
                                        </a>
                                     </li>

                                    <li class="divider"></li>
                                     <li>
                                        <a href="{{route('typeparticipant.create')}}">
                                            Ajouter un type
                                        </a>

                          
                                    </li>
                                    
                                </ul>

                            </li>

                             @endif 

                             
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Salles <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('salle.index')}}">
                                            Afficher les salles
                                        </a>
                                     </li>

                                     @if(Auth::user()->is_admin) 
                                    <li>
                                        <a href="{{route('salle.create')}}">
                                            Ajouter une salle
                                        </a>
                                     </li>
                                     @endif

                                   
                                     
                                    
                                </ul>
                            
                            </li>

                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Matériels <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('materiel.index')}}">
                                            Afficher les matériels
                                        </a>
                                     </li>
                                     @if(Auth::user()->is_admin) 
                                    <li>
                                        <a href="{{route('materiel.create')}}">
                                            Ajouter un matériel
                                        </a>
                                     </li>

                                    <li class="divider"></li>
                                     <li>
                                        <a href="{{route('catmateriel.create')}}">
                                            Ajouter une categorie
                                        </a>

                          
                                    </li>
                                    @endif
                                    
                                </ul>

                                

                            </li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Evenements <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('formation.index')}}">
                                            Afficher les evenements
                                        </a>
                                     </li>
                                    <li>
                                        <a href="{{route('formation.create')}}">
                                            Ajouter un evenement
                                        </a>
                                     </li>   
                                    
                                </ul>

                                

                            </li>

                             @if(Auth::user()->is_admin) 

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Rapports & statistique <span class="caret"></span>
                                </a>

                                                                   
                                   <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('formation.rapport')}}">
                                            rapport des evenements
                                        </a>
                                     </li>
                                    <li>
                                        <a href="">
                                            Statistique
                                        </a>
                                     </li>

                                
                                    
                                </ul>
                                
                            </li>

                            @endif 

                    </ul>
     

      <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                     {{ strtoupper(Auth::user()->name) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

@endif