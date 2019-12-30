<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {

        public $table = "categories";
        
        const CATEGORY_NAME = 'category_name';
        
        protected $fillable = [
            'category_name',
        ];

    }
    