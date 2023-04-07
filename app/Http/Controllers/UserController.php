<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::with('group')->get();
        return view('users.users',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $this->data['groups'] = Group::pluck('title','id');
       $this->data['mode']   = 'create';
       $this->data['headline'] = 'Add New User';
       return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $request->validated();
       if( User::create($request->validated())){
         Session::flash('message','User Added Successfully');
       }
       return  redirect()->to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = User::find($id);
        return view('users.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user'] = User::findOrFail($id);
        $this->data['groups'] = Group::pluck('title','id');
        $this->data['mode']   = 'edit';
        $this->data['headline'] = 'Update Information';
        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
       $data = $request->validated();
       $user = User::find($id);
       if($user->update($data)){
        Session::flash('message','User Updated Successfully');
       }
       return  redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        if( User::find($id)->delete() ) {
            Session::flash('message', 'User Deleted Successfully');
        }
        
        return redirect()->to('users');
        
    }
}
