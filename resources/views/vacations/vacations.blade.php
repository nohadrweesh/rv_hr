@extends('layouts.master')
@section('css_files')
@stop

@section('content')


<h1>My Vacations</h1>


<table id="vacations-table" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Request Date</th>
      <th scope="col">Title</th>
      <th scope="col">Reason</th>
      <th scope="col">Availability</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($vacations as $vacation)
    <tr id='{{$vacation->id}}'  data-toggle="modal" data-target="#orderModal"> 
      <th>{{$vacation->from}}  </th>
      <th>{{$vacation->to}}  </th>
      <th>{{$vacation->created_at}}  </th>
      <th>{{$vacation->title}}  </th>
      <th>{{$vacation->reason}}  </th>
       @if ($vacation->availabilty===0)
        <th>Not available To work</th>
      @else
        <th>Available To work </th>
      @endif
      
      <th class="status status-pending">{{$vacation->status}}  </th>
      <td>
        
          <button type="button" class="btn btn-success btn-sm" id="managerConfirmed">Mgr Confirm</button>
          <button type="button" class="btn btn-success btn-sm" id="hrConfirmed">Hr Confirm</button>
          <button type="button" class="btn btn-danger btn-sm" id="rejected">Reject</button>
          <button type="button" class="btn btn-info btn-sm" id="canceled">Cancel</button>
        


      </td>
    </tr>
    @endforeach
   
  </tbody>
    </table>

    <!-- Modal -->

<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title">Vacation Working Hours</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="vacationWorkingsTable" class="table table-striped">
          <thead>
            <!--<tr>
              <th scope="col">Date</th>
              <th scope="col">Hours</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              
              
            </tr>-->
          </thead>
          <tbody>
            
          </tbody>

        </table>
      </div>
      
    </div>
  </div>
</div>
 




@stop
@section('scripts')
<script>
  
  var token='{{csrf_token()}}';
  var url='{{route('editStatus')}}';
  var url1='{{route('getVacationData')}}';
</script>

<script src="{{ asset('js/vacations.js') }}"></script>
@stop