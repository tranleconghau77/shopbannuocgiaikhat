<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['customer_name','customer_email','customer_password','customer_phone'];
    protected $primaryKey='customer_id';
    protected $table='tbl_customers';

    public function orders() {
        return $this->hasMany('App\Models\Order','order_id');
    }
}