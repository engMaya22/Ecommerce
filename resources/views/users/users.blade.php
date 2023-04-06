@extends('layout.main')

 @section('main_content')

  <div class="row clearfix page_header">
    <div class="col-md-6">
      <h2>Users List</h2>
       </div>

    <div class="col-md-6 text-right">
        <a class="btn btn-info" href="{{url('users/create')}}" > <i class="fa fa-plus"> </i> New User </a>
    </div>
 </div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Group</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                       <td>{{$user->group->title}}</td> 
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td class="text-right">
                            <form action="{{url('groups/delete/'.$user->id)}}" method="POST">
                                @csrf
                                <a  class="btn btn-primary btn-sm" href="{{route('users.edit',$user->id)}}" >
                                  <i class="fa fa-edit"> </i>
                                </a>
                                @method('DELETE')
                             <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure')">   
                               <i class="fa fa-trash"> </i> 
                              </button>
                            </form>
                        
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop