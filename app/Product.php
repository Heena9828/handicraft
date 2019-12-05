<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
           'product_name', 'sku', 'price', 'description',
       ];

       public function categories()
       {
           return $this->belongsTo('App\Category','category_id');
       }
}
