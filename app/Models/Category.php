<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'meta_keywords',
        'category_name',
        'slug_category_product',
        'category_desc',
        'category_status'];
    protected $primaryKey='category_id';
    protected $table='tbl_category_product';

    public function products() {
        return $this->hasMany('App\Models\Product','product_id');
    }
}