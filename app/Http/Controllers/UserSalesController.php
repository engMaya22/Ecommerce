<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserSalesController extends Controller
{

    public function __construct()
    {
    	$this->data['tab_menu'] = 'sales';
    }
    
    public function index( $id){
       $this->data['user'] = User::findOrFail($id);
    //    $this->data['sales'] = 
       return view('users.sales.sales',$this->data);

    }

    public function createInvoice(InvoiceRequest $request , $user_id){
          
        $request['user_id'] = $user_id;
        if($invoice = SaleInvoice::create($request->all())){
            Session::flash('message',' Sale Invoice Created Successfully');
           }
        return  to_route('user.sales.invoice_details',['id' => $user_id ,'invoice_id'=>$invoice->id]);
    }

    public function destroyInvoice($user_id , $invoice_id){
       
        if(SaleInvoice::destroy($invoice_id)) {
            Session::flash('message', 'Invoice Deleted Successfully');
        }
        $this->data['user'] = User::findOrFail($user_id);
        return view('users.sales.sales',$this->data);
        
    }

    public function invoice($user_id , $invoice_id){
        $this->data['user'] = User::findOrFail($user_id);
        $this->data['invoice'] = SaleInvoice::findOrFail($invoice_id);
        $this->data['products'] = Product::pluck('title','id');
       // dd( $this->data['invoice']->items );
        return view('users.sales.invoice',$this->data);

    }

    public function addItem(InvoiceProductRequest $request,$user_id , $invoice_id){
        
        $request->validated();
        $request['sale_invoice_id'] = $invoice_id;
        if( SaleItem::create($request->all())){
         Session::flash('message','Item Added Successfully');
        }//
       return  to_route('user.sales.invoice_details',['id' => $user_id ,'invoice_id'=>$invoice_id]);
    }

    //test
    public function destroyItem($user_id ,$invoice_id , $item_id){
     
        if(SaleItem::destroy($item_id)) {
            Session::flash('message', 'Invoice Item Deleted Successfully');
        }
        $this->data['user'] = User::findOrFail($user_id);
        return to_route('user.sales.invoice_details',['id' => $user_id ,'invoice_id'=>$invoice_id]);
    }
   

    
}
