<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'product_quantity',
        'product_sold',
        'product_slug',
        'category_id',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'prodcut_image',
        'product_status'
    ];
    protected $primaryKey='product_id';
    protected $table='tbl_product';

    public function brand() {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}