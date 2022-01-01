<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['customer_id','shipping_id','payment_id','order_total','order_status'];
    protected $primaryKey='order_id';
    protected $table='tbl_order';

    public function customer() {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function shipping() {
        return $this->belongsTo('App\Models\Shipping','shipping_id');
    }

    public function payment() {
    }

    public function order_details() {
        return $this->hasMany('App\Models\Order_Details','order_details_id');
    }
}