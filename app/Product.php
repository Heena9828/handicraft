<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
           'product_name', 'sku', 'price', 'description', 'category_id', 'subcategory_id'
       ];

       public function categories()
       {
           return $this->belongsTo('App\Category','category_id');
       }
       
       public function subcategories()
       {
           return $this->belongsTo('App\SubCategory','subcategory_id');
       }
}
