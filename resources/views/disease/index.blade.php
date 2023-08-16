<div id="DiseaseContainer">
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


 <br /> <h3 align="center">Disease Table</h3> <br /> 
 <div class="info"></div>
      <div id="diseaseContainerTable" class="container">
      <div  class="table-responsive">
       <table id="diseaseTable" class="table table-striped table-hover">
          <thead>
            <tr>
              <th style="color: black;">ID</th>
              <th style="color: black;">Disease Name  </th>
              <th style="color: black;">Disease Description</th>
              <th style="color: black;" class="actionsCol" style="text-align:center;">Action</th>
              </tr>
          </thead>
          <tfoot>
              <th style="color: black;">ID</th>
              <th style="color: black;">Disease Name  </th>
              <th style="color: black;">Disease Description</th>
          </tfoot>
        </table>
    </div>
    </div>


 <div class="modal fade" id="diseaseCreateModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add new disease</h4>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
     <form id="diseaseCreateform" method="post" action="#" enctype="multipart/form-data">
     <div class="modal-body">
                   
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('disease.create')
                    
                <div class="modal-footer">
                    <button type="button" class="closeModal btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="diseaseCreateSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
    </div>
               
    </form>
            </div>
        </div>
  </div>

<div class="modal fade" id="diseaseEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit disease</h4>
                  </div>
     <form id="diseaseEditform" method="post" action="" enctype="multipart/form-data">
     <div class="modal-body">
                   
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('disease.edit')
                    
                <div class="modal-footer">
                    <button type="button" class="closeModal btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="diseaseEditSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
    </div>
               
    </form>
            </div>
        </div>
</div>

   <div class="modal fade" id="diseaseShowModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Show Disease</h4>
                        </div>
                @include('disease.show')
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





