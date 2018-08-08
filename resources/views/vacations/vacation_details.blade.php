@extends('layouts.master')
@section('css_files')
@stop

@section('content')


<h1>Vacation Details</h1>


<table id="vacations-table" class="table table-striped">
  <thead>
    <tr>
       <th scope="col">Date</th>
      <th scope="col">Hours</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($vacationWorkings as $vacationWorking)

    <tr  ><!--data-target="#orderModal"--> 
      <th>{{$vacationWorking->date}}  </th>
      <th>{{$vacationWorking->hours}}  </th>
      <th>{{$vacationWorking->from}}  </th>
      <th>{{date('h:i:s ', strtotime($vacationWorking->from)+$vacationWorking->hours*60*60)}}  </th>
      
        
      
    </tr>
    @endforeach
   
  </tbody>
    </table>

    <!-- Modal -->





@stop
@section('scripts')

@stop