<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupController extends Controller
{
    public function index(){
        $this->data['groups'] = Group::all();
        return view('groups.groups' , $this->data);
    }
    public function create(){
        return view('groups.create');
    }
    public function store(Request $request){
      $formData = $request->all();
      if(Group::create($formData)){
        Session::flash('message','Group Generated Successfully');
      }
      return  redirect()->to('groups');
    }
    public function destroy($id){
     if(Group::find($id)->delete()){
        Session::flash('message','Group Deleted Successfully');
     }
     return  redirect()->to('groups');


    }
}
