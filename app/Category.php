<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {
           public $table = "categories";

        public $table = "categories";
        protected $fillable = [
            'category_name',
        ];

    }
    
