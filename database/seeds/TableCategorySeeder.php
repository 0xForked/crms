<?php

use Illuminate\Database\Seeder;

class TableCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'mobile app development',
                'description' => 'mobile app development category'
            ],
            [
                'name' => 'web app development',
                'description' => 'web app development category'
            ],
            [
                'name' => 'android',
                'description' => 'android app development category'
            ],
            [
                'name' => 'kotlin',
                'description' => 'kotlin programming language category'
            ],
            [
                'name' => 'vue.js',
                'description' => 'vue.js javascript framework category'
            ],
            [
                'name' => 'javascript',
                'description' => 'javascript programming language category'
            ],
            [
                'name' => 'laravel',
                'description' => 'laravel php framework category'
            ],
            [
                'name' => 'codeigniter',
                'description' => 'codeigniter php framework category'
            ],
            [
                'name' => 'php',
                'description' => 'php programming language category'
            ],
            [
                'name' => 'golang',
                'description' => 'go programming language category'
            ],
        ];

        foreach ($data as $category) {
            \App\Models\Category::create($category);
        }
    }
}
