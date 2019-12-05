<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class SubCategory extends Model
    {
        public $table = "subcategories";

        protected $fillable = [
            'sub_category_name', 'category_id',
        ];

        public function categories()
        {
            return $this->belongsTo('App\Category', 'category_id');
        }

    }
    