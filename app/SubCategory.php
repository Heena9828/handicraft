<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class SubCategory extends Model
    {

        public $table = "subcategories";

        const Sub_Category_Name = 'sub_category_name';
        const Category_Id = 'category_id';

        protected $fillable = [
            'sub_category_name', 'category_id',
        ];

        public function categories()
        {
            return $this->belongsTo('App\Category', 'category_id');
        }

    }
    