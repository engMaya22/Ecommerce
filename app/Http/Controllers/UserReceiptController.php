<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserReceiptController extends Controller
{
    public function __construct()
    {
    	$this->data['tab_menu'] = 'receipts';
    }
    
    public function index( $id){
       $this->data['user'] = User::with('receipts')->findOrFail($id);
       return view('users.receipts.receipts',$this->data);

    }
    public function store(ReceiptRequest $request ,$user_id){

        
        if( Receipt::create($request->all())){
         Session::flash('message','Payments Added Successfully');
        }
        return  redirect()->route('user.receipts',$user_id);
    }

    public function destroy($id,$receipt_id){
        if(Receipt::destroy($receipt_id)) {
            Session::flash('message', 'Receipt Deleted Successfully');
        }
        
        return to_route('user.receipts',$id);
    }
}
