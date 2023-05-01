<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SaleInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id','user_id',
                           'date','challan_no',
                           'note'];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->admin_id = Auth::id();
        });
        
    }                       
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function items(){
        return $this->hasMany(SaleItem::class);
    }
  
}
