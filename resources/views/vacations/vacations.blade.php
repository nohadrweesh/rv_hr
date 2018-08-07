@extends('layouts.master')
@section('css_files')
@stop

@section('content')


<h1>My Vacations</h1>


<table class="table table-striped">
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
    <tr id='{{$vacation->id}}'>
      <th>{{$vacation->from}}  </th>
      <th>{{$vacation->to}}  </th>
      <th>{{$vacation->created_at}}  </th>
      <th>{{$vacation->title}}  </th>
      <th>{{$vacation->reason}}  </th>
      <th>{{$vacation->availabilty}}  </th>
      <th class="status status-pending">{{$vacation->status}}  </th>
      <td>
        
          <button type="button" class="btn btn-success btn-sm" id="mgr_confirm">Mgr Confirm</button>
          <button type="button" class="btn btn-success btn-sm" id="hr_confirm">Hr Confirm</button>
          <button type="button" class="btn btn-danger btn-sm" id="reject">Reject</button>
          <button type="button" class="btn btn-info btn-sm" id="cancel">Cancel</button>
        


      </td>
    </tr>
    @endforeach
   
  </tbody>
    </table>


@stop
@section('scripts')
<script>
  
  var token='{{csrf_token()}}';
  var url='{{route('editStatus')}}';
</script>
<script src="{{ asset('js/vacations.js') }}"></script>
@stop