<div id="AdopterContainer">
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


<br /> <h3 align="center">Adopters Table</h3> <br /> 
<div class="info"></div>
      <div id="adopterContainerTable" class="container">
      <div  class="table-responsive">
       <table id="adopterTable" class="table table-striped table-hover">
          <thead>
            <tr>
              <th style="color: black;">ID</th>
              <th style="color: black;">Adopter First Name</th>
              <th style="color: black;">Adopter Last Name</th>
              <th style="color: black;">Adopter Age</th>
              <th style="color: black;">Adopter Contact</th>
              <th style="color: black;">Adopter Address</th>
              <th style="color: black;">Adopter Gender</th>
              <th style="color: black;" class="actionsCol" style="text-align:center;">Action</th>
              </tr>
          </thead>
          <tfoot>
               <th style="color: black;">ID</th>
              <th style="color: black;">Adopter First Name</th>
              <th style="color: black;">Adopter Last Name</th>
              <th style="color: black;">Adopter Age</th>
              <th style="color: black;">Adopter Contact</th>
              <th style="color: black;">Adopter Address</th>
              <th style="color: black;">Adopter Gender</th>
          </tfoot>
        </table>
    </div>
    </div>

    <div class="modal fade" id="adopterCreateModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add new adopter</h4>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
     <form id="adopterCreateform" method="post" action="#" enctype="multipart/form-data">
     <div class="modal-body">
                   
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('adopter.create')
                    
                <div class="modal-footer">
                    <button type="button" class="closeModal btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="adopterCreateSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
    </div>
               
    </form>
            </div>
        </div>
    </div>


<div class="modal fade" id="adopterEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit adopter</h4>
                  </div>
     <form id="adopterEditform" method="post" action="" enctype="multipart/form-data">
     <div class="modal-body">
                   
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('adopter.edit')
                    
                <div class="modal-footer">
                    <button type="button" class="closeModal btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="adopterEditSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
    </div>
               
    </form>
            </div>
        </div>
</div>



    <div class="modal fade" id="adopterShowModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Show Adopter</h4>
                        </div>
                @include('adopter.show')
                 <div class="modal-footer">
                    <button type="button" class="closeModal btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
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





