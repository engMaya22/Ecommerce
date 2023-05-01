<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function store(PaymentRequest $request ,$user_id){
        if( Payment::create($request->all())){
         Session::flash('message','Payments Added Successfully');
        }
        return  to_route('user.payments',$user_id);
    }

    public function destroy($id,$payment_id){
        if(Payment::destroy($payment_id)) {
            Session::flash('message', 'Payment Deleted Successfully');
        }
        
        return redirect()->route('user.payments',$id);
    }
}
