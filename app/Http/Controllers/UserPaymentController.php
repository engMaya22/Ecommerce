<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    public function __construct()
    {
    	$this->data['tab_menu'] = 'payments';
    }
    
    public function index( $id){
       $this->data['user'] = User::with('payments')->findOrFail($id);
       return view('users.payments.payments',$this->data);

    }
}
