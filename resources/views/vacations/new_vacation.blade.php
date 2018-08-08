@extends('layouts.master')
@section('css_files')
@stop

@section('content')


<h1>Request A New Vacation</h1>

<form method="POST" action="/vacations">
  {{ csrf_field() }}

        <div class="row">
          <div class='col-sm-4'>
              <div class="form-group ">
                  
                  <div class='input-group date' >
                    <label for="datepicker_start">From :  </label>
                      <input type='text' class="form-control" id='datepicker_start' name="datepicker_start" />
                      
                  </div>
                  
              </div>
          </div>
          
          <div class='col-sm-4 '>
              <div class="form-group ">
                  
                  <div class='input-group date' >
                    <label for="datepicker_end">To :  </label>
                      <input type='text' class="form-control" id='datepicker_end' name="datepicker_end"/>
                      
                  </div>
                  
              </div>
          </div>
       
        </div>
        
    

  <div class="raw">
    <div class="form-group">
      <label for="fromInput">From</label>
      <input type="date" name="vacFrom" class="form-control" id="fromInput" placeholder="1/3/2018">
    </div>

     <div class="form-group">
      <label for="toInput">To</label>
      <input type="date" name="vacTo" class="form-control" id="toInput" placeholder="5/3/2018">
    </div>
  </div>
  <div class="form-group">
    <label for="titleInput">Title :</label>
    <input type="text" name="title" class="form-control" id="titleInput">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Reason :</label>
    <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="raw">
     Availability To Work : <br>
    <label class="switch">

      <input type="checkbox" name="availability" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" checked>
      <span class="slider round"></span>

    </label>
  </div>
 

 
  <div  class="collapse show" id="collapseExample" >
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Working Hours</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
    </tr>
  </thead>
  <tbody>
       
  </tbody>
    </table>
  </div>
  <button class="btn btn-primary" type="submit">Report</button>
</form>


@stop
@section('scripts')
<script src="{{ asset('js/vacation.js') }}"></script>

<script type="text/javascript">

  $(function() {

       /* global setting */
      var datepickersOpt = {
          dateFormat: 'dd-mm-yy',
          minDate   : 0
      }

      $("#datepicker_start").datepicker($.extend({
          onSelect: function() {
              var minDate = $(this).datepicker('getDate');
              
              minDate.setDate(minDate.getDate()); //add two days
              $("#datepicker_end").datepicker( "option", "minDate", minDate);
          }
      },datepickersOpt));

      $("#datepicker_end").datepicker($.extend({
          onSelect: function() {
              var maxDate = $(this).datepicker('getDate');
             
              maxDate.setDate(maxDate.getDate());
              $("#datepicker_start").datepicker( "option", "maxDate", maxDate);
          }
      },datepickersOpt));
  }); 
 
    
    
</script>  
@stop