<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index( $id){
       $this->data['user'] = User::findOrFail($id);
       return view('users.sales.sales',$this->data);

    }
}
