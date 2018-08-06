@extends('layouts.master')
@section('content')




<form>
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

      <input type="checkbox" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" checked>
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
    <tr>
      <th scope="row">02/09</th>
      <td><input type="text" value="4"></td>
      <td> <input type="text" value=""></td>
      <td> <input type="text" value=""></td>
    </tr>
    <tr>
      <th scope="row">02/09</th>
      <td><input type="text" value="2"></td>
      <td> <input type="text" value="10am"></td>
      <td> <input type="text" value="12am"></td>
      
    </tr>
    <tr>
      <th scope="row">04/09</th>
      <td><input type="text" value="0"></td>
      <td>
        <input type="text" value="" disabled>
        <br>
        <small>working hours is zero</small>
      </td>
      <td>
        <input type="text" value="" disabled>
        <br>
        <small>working hours is zero</small>
      </td>
    </tr>
  </tbody>
    </table>
  </div>
  <button class="btn btn-primary" type="submit">Report</button>
</form>


@stop
@section('content')