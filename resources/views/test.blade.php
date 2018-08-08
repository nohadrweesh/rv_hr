
@extends('layouts.master')
@section('content')
 
<p>Date: <input type="text" id="datepicker"></p>
@stop
@section('scripts')
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


@stop


