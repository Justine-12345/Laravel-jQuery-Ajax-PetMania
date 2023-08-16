@extends('layouts.base')
@include('layouts.nav')
@section('body')

 
<div id="DashboardContainer">
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
canvas{
  margin-top: 30px;
  width:100% !important;
  height:600px !important;

}
</style>
  <div id="landingPageAdopted" class="pages">
     @include('landingpage.adopted')
  </div>
  <div id="landingPageMain" class="pages">
    @include('landingpage.main')
  </div>
    <div id="loginPage" class="pages">
       @include('auth.login');
    </div>
     <div id="registerPage" class="pages">
    @include('auth.register');
    </div>
    
    <div id="waitingPage" class="pages">
    @include('waiting');
    </div>

   <div id="rescuerShowPage" class="pages">
   @include('rescuer.rescuerPart');
   </div>

   <div id="adopterShowPage" class="pages">
   @include('adopter.adopterPart');
   </div>

   <div id="veterinarianShowPage" class="pages">
    @include('veterinarian.veterinarianPart');
  </div>
    <div id="dashboardPage" class="pages">
      @if($message = Session::get('success') )

      <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 80%; margin: auto; margin-top: 30px">
        <strong>{{ $message }} <i class="fas fa-check" style="color: green"></i></strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @endif

        <h3 style="text-align:center;">Admin Dashboard</h3>

                  <div class="row" style="margin: 30px">
                    

                      
                        <div class="col-lg-6" id="animalAdopted_chart_container" style=" border-radius:1%;">
                              
                            <button id="openChart1" class="btn btn-primary" style="margin-left:20px; width:30%">Set Date Range</button>

                              <div class="row" id="datePicker1" style="width:100%;box-shadow: 1px 1px 3px  gray;position: absolute;background: white;">

                                <div class="col-lg-6">
                                   <label><b>Start</b></label><br>
                                   <div id="datepickerAdoptedStart" style="display:inline-block;"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b>End</b></label><br>
                                    <div id="datepickerAdoptedEnd" style="display:inline-block;"></div>
                                </div>
                                <div class="col-lg-12">
                                    <button id="datepickerAdoptedApply" class="btn btn-defaultt" style="margin: 3px;border: 1px groove white;"><b>Apply</b></button><i><b style="color:red;" id="rangeWarning1"></b></i>
                                </div>
                                
                                
                              </div>

                               <canvas id="myChart" width="10" height="10"></canvas>
                          </div>


                        <div class="col-lg-6" id="animalRescued_chart_container" style=" border-radius:1%;">  

                              <button id="openChart2" class="btn btn-primary" style="margin-left:20px; width:30%">Set Date Range</button>
                              
                              <div class="row" id="datePicker2" style="width:100%;box-shadow: 1px 1px 3px  gray;position: absolute;background: white;">

                                <div class="col-lg-6">
                                   <label><b>Start</b></label><br>
                                   <div id="datepickerRescuedStart" style="display:inline-block;"></div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b>End</b></label><br>
                                    <div id="datepickerRescuedEnd" style="display:inline-block;"></div>
                                </div>
                                <div class="col-lg-12">
                                    <button id="datepickerRescuedApply" class="btn btn-defaultt" style="margin: 3px;border: 1px groove white;"><b>Apply</b></button><i><b style="color:red;" id="rangeWarning2"></b></i>
                                </div>
                                
                                
                              </div>


                               <canvas id="myChart1" width="10" height="10"></canvas>
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
      <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
      </script>
  <div id="landingPageShow" class="pages">
   @include('landingpage.show');
  </div>

  </div>
  
  <div id="animalPage" class="pages">
    @include('animal.index')
    </div>
   <div id="userPage" class="pages">  
    @include('user.index')
    </div>  
   <div id="rescuerPage" class="pages">
    @include('rescuer.index')
    </div>
   <div id="adopterPage" class="pages">
    @include('adopter.index')
    </div>
   <div id="veterinarianPage" class="pages">
    @include('veterinarian.index')
    </div>
   <div id="diseasePage" class="pages">
    @include('disease.index')
    </div>

  <div id="requestPage" class="pages">
     @include('request.index')
  </div>
 


@stop





