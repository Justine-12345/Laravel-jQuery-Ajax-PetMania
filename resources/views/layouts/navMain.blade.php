<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5AF2CD";>
  <a class="navbar-brand" href="#"><i class="fas fa-paw" style="font-size: 30; padding-right: 8px; color: darkgreen; border: 3px dashed darkgreen; padding :8px; border-radius: 20px; margin-top: 0px"></i><b style="padding-left: 5px">PetMania</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 8px">
   <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('frontpage') }}">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('animal') }}">Animals<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('adopted') }}">Adopted<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{ route('message.create') }}">Message<span class="sr-only">(current)</span></a>
      </li>

         </ul>
   {{--  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
<span style="float: right; margin-left:">
     <a href="{{ route('login') }}" class="btn my-2 my-sm-0" type="submit" style="color: green"><b style="font-weight: 500;">Log in</b>


    </a>
    </span>
{{-- 
    </form> --}}
  </div>
</nav>
@include('design.style')