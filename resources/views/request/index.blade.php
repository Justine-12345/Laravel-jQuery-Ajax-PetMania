<div id="RequestTableContainer">
<div>
<style type="text/css">
  tr {
    font-size: 12px;
    text-align: left;
  }
  a{
    color: black;
    text-decoration: none;
  }

   a:hover {
    color: red;
    text-decoration: none;
  }

    i {
    font-size: 15px;
    padding: 5px;
  }
  
</style>

@if($message = Session::get('success') )

<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%; margin: auto; margin-top: 30px">
  <strong>{{ $message }} <i class="fas fa-check" style="color: green"></i></strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif


{{-- <div style="position: fixed;width: 10% ; right: 5px; bottom:0px;" >
<h2>
@if(auth()->user()->role == "admin")
<form action="{{ route('disease.create') }}" method="get">
<button type="submit" class="btn" style="width: 100%; font-size: 12px; background-color: #1DD023; color: white" >Add <i class="fas fa-plus"></i></button>
</form>
@endif
<div>
</h2>
</div> --}}


 


<br /> <h3 align="center">Adaption Request Table<br><br>
  <input class="form-control" type="text" id='adoptionRequestSearch' placeholder="--search--" style="width:40%; display:inline-block">
</h3> <br /> 



<div class="info"></div>
      <div id="adopterContainerTable" class="container">
      <div  class="table-responsive">
       <table id="adopterTable" class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th style="color: black;">Animal ID</th>
              <th style="color: black;">Animal Name</th>
              <th style="color: black;">Adopter First Name</th>
              <th style="color: black;">Adopter Last Name</th>
              <th style="color: black;">Adopter Contact</th>
              <th style="color: black;">Adoption Status</th>
              <th style="color: black;">Code</th>
              <th style="color: black;" class="actionsCol" style="text-align:center;">Action</th>
              </tr>
          </thead>
          <tbody id="cbody">
              
          </tbody>
          <tfoot>
              <th style="color: black;">Animal ID</th>
              <th style="color: black;">Animal Name</th>
              <th style="color: black;">Adopter First Name</th>
              <th style="color: black;">Adopter Last Name</th>
              <th style="color: black;">Adopter Contact</th>
              <th style="color: black;">Adoption Status</th>
              <th style="color: black;">Code</th>
          </tfoot>
        </table>
    </div>
    </div>
</div>
<style type="text/css">
  .page-link{
    color: darkgreen;
  }
  .page-link:hover {
    background-color: lightgreen;
  }
</style>
</div>





