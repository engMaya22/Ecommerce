@extends('layout.main')

 @section('main_content')
  <h2>Create New Group</h2>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> New Group</h6>
    </div>
    <div class="card-body">
      
    <div class="row justify-content-center">
       <div class="md-col-6">
          <form  method="POST" action="{{url('groups/store')}}">
            @csrf
            <div class="form-group">
              <label for="title">User Group Title:</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Group Title"> 
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
       </div>
    </div>

    </div>
 </div>

@stop