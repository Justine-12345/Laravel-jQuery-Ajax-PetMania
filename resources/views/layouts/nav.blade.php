{{-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5AF2CD";>
  <a class="navbar-brand" href="#"><i class="fas fa-paw" style="font-size: 30; padding-right: 8px; color: darkgreen; border: 3px dashed darkgreen; padding :8px; border-radius: 20px; margin-top: 0px"></i><b style="padding-left: 5px">PetMania</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 8px">


    <ul class="navbar-nav mr-auto">
      @if(auth()->user()->role == "admin")
       <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index') }}">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('animal.index') }}">Animal<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{ route('rescuer.index') }}">Rescuer<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('adopter.index') }}">Adopter<span class="sr-only">(current)</span></a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('disease.index') }}">Disease<span class="sr-only">(current)</span></a>
      </li>
       @if(auth()->user()->role == "admin")
      <li>
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('message.index') }}">Messages<span class="sr-only">(current)</span></a>
      </li>
      @endif
      @endif
         </ul>


    <form class="form-inline my-2 my-lg-0"> --}}
     {{--  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
    {{--  <a href="{{ route('logout') }}" class="btn my-2 my-sm-0" type="submit" style="color: green"><b style="font-weight: 500">Log Out</b>

<b class="hovicon effect-8" style="height: 15px;width: 15px; margin: 0px;padding: 0px">
      <i class="fas fa-power-off" style="padding: 0px; font-size: 15px; color: darkgreen"></i>
</b>  
    </a>

    </form>
  </div>
</nav>
@include('design.style') --}}




<nav class="navbar navbar-default" style="background-color: #00abed;z-index: 10;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fas fa-paw" style="font-size: 20px; padding-right: 0px; color: #f0f4f6; border: 3px dashed #f0f4f6; padding :7px; border-radius: 15px; margin-top: 0px; position: relative; bottom:10px"></i><b style="padding-left: 5px; color: #f0f4f6; position:relative;bottom: 10px;" >PetMania</b></a>
    </div>

{{-- {{dd(session()->get('cur_tab'))}} --}}
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right" id="navForUsers">
          <li><a style="color: white; cursor: pointer;" id="adoptNav">Adopt</a></li>{{-- 
          <li><a style="color: white; cursor: pointer;" id="requestNav1">Request</a></li> --}}
          {{-- <li><a style="color: white; cursor: pointer;" id="animalNav1">Animals</a></li> --}}
          <li><a style="color: white; cursor: pointer;" id="adoptedNav">Adopted</a></li>
          <li><a style="color: white; cursor: pointer;" id="animalVetNav">Animals</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#517cc9;">Account<span class="caret"></span></a>
          <ul class="dropdown-menu">

           {{--  @if(Auth::check())
            @if(auth()->user()->role != "admin" && auth()->user()->role != "new" && auth()->user()->role != "deactive" ) --}}
           {{--  <li><a>My Profile</a></li> --}}
           {{--  @endif
            @if(auth()->user()->role == "admin" && auth()->user()->role != "new" && auth()->user()->role != "deactive") --}}
           {{--  @endif --}}
          {{--   @else --}}
            <li id="myProfileNav"><a>Home</a></li>
            <li id="logoutNav"><a>Log out</a></li>
            <li id="loginNav"><a >Log in</a></li>
             <li id="signupNav"><a>Sign up</a></li>
           {{--  @endif --}}
          </ul>

           {{--  @if(Auth::check())
            @if(auth()->user()->role != "admin" && auth()->user()->role != "new" && auth()->user()->role != "deactive" ) --}}
           {{--  <li><a>My Profile</a></li> --}}
           {{--  @endif
            @if(auth()->user()->role == "admin" && auth()->user()->role != "new" && auth()->user()->role != "deactive") --}}
            
           {{--  @endif --}}
            
          {{--   @else --}}
           {{--  @endif --}}
         
        </li>
      </ul>  
      
      <ul class="nav navbar-nav navbar-right" id="navForAdmin">
        {{-- @if(Auth::check() && auth()->user()->role == "admin") --}}
        <li id="dashboardNav" class="{{session()->get('cur_tab') == "dashboard"? "active": null}}" style="border: 0px solid white; height: 30px"><a style="cursor: pointer;color: white; height:52px; position: relative; bottom:2px"> <i class="fas fa-tachometer-alt" style="position:relative; left: 0px;color: white; text-shadow: none;">
          
        </i> Dashboard</a></li>

        <li><a style="color: white; cursor: pointer;" id="newUserNav">New Users</a></li>

        <li><a style="color: white; cursor: pointer;" id="animalNav2">Animals</a></li>

        <li><a style="color: white; cursor: pointer;" id="resuersNav">Rescuers</a></li>

        <li><a style="color: white; cursor: pointer;" id="adoptersNav">Adopters</a></li>

        <li ><a style="color: white; cursor: pointer;" id="veterinariansNav">Veterinarians</a></li>

        <li><a style="color: white; cursor: pointer;" id="diseasesNav">Diseases</a></li>

        {{-- <li class={{session()->get('cur_tab') == "messages"? "active": null}}><a href="{{ route('message.index') }}" style="color:{{session()->get('cur_tab') == "messages"? "black": "#f0f4f6"}}">Messages</a></li> --}}
         <li><a style="color: white; cursor: pointer;" id="requestNav2">Request</a></li>

{{--         <li class={{session()->get('cur_tab') == "request"? "active": null}}>
           <a href="{{ route('adopter.request',['adopter_id' => 0]) }}" style="color: {{session()->get('cur_tab') == "request"? "black": "white"}};">Request<span class="sr-only">(current)</span></a>
            </li> --}}


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#517cc9;">Account<span class="caret"></span></a>

            <ul class="dropdown-menu">

           {{--  @if(Auth::check())
            @if(auth()->user()->role != "admin" && auth()->user()->role != "new" && auth()->user()->role != "deactive" ) --}}
           {{--  <li><a>My Profile</a></li> --}}
           {{--  @endif
            @if(auth()->user()->role == "admin" && auth()->user()->role != "new" && auth()->user()->role != "deactive") --}}
            <li><a id="myProfileNav2">Home</a></li>
           {{--  @endif --}}
            <li><a id="logoutNav2">Log out</a></li>
          {{--   @else --}}
           {{--  @endif --}}
          </ul>
        </li>
      

        </ul>
      {{--   @endif
 --}}
       {{--   @if(!Auth::check() || auth()->user()->role != "admin")
           @if(@auth()->user()->role == "adopter" || !Auth::check())
            <li class="nav-item">
           <a class="nav-link" href="{{ route('frontpage') }}" style="color: white;">Adopt<span class="sr-only">(current)</span></a>
            </li>
            
           @if(@auth()->user()->role == "adopter" || Auth::check())
            <li class="nav-item">
           <a class="nav-link" href="{{ route('adopter.request',['adopter_id' => auth()->user()->id]) }}" style="color: white;">Request<span class="sr-only">(current)</span></a>
            </li>
           @endif

         @endif
         @if(@auth()->user()->role != "new" && @auth()->user()->role != "deactive")
          <li class="nav-item">
            <a class="nav-link" href="{{ route('animal') }}" style="color: white;">Animals<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('adopted') }}" style="color: white;">Adopted<span class="sr-only">(current)</span></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{ route('message.create') }}" style="color: white;">Message<span class="sr-only">(current)</span></a>
          </li>
          @endif
         @endif --}}


  



    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <img src="https://wallpaperaccess.com/full/4671256.jpg" style="width:100%; position: fixed;right: 0%;left: 0%;height: 100%;top: 0px;z-index: -10;">