<?php

    use Illuminate\Database\Seeder;

    class CategoryTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // insert
//            App\Category::create([
//                'category_name' => 'AA'
//            ]);

            $data = [
                    ['category_name' => 'AA'],
                    ['category_name' => 'BB'],
            ];

            App\Category::insert($data);
        }

    }
    