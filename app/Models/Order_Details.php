<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['order_id','product_id','product_name','product_price','product_sales_quantity'];
    protected $primaryKey='order_details_id';
    protected $table='tbl_order_details';

    public function order() {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function product() {
        return $this->belongsTo('App\Models\product','product_id');
    }
}