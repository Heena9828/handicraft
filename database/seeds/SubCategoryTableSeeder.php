<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SubCategory::create([
                'sub_category_name' => 'A-aa'
            ]);

    }
}
