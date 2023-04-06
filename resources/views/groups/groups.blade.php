@extends('layout.main')

 @section('main_content')
     
     
     <div class="row clearfix page_header">

        <div class="col-md-6">
            <h2>Users Group</h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{url('groups/create')}}" > <i class="fa fa-plus"> </i> New Group </a>
        </div>
     </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach ($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->title}}</td>
                            <td class="text-right">
                                <form action="{{url('groups/delete/'.$group->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure')">    <a  class="btn btn-danger"> <i class="fa fa-trash"> </i> Delete</a></button>
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