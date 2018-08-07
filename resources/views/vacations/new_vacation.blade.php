@extends('layouts.master')
@section('css_files')
@stop

@section('content')


<h1>Request A New Vacation</h1>

<form method="POST" action="/vacations">
  {{ csrf_field() }}
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
@stop