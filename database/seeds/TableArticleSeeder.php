<?php

use Illuminate\Database\Seeder;

class TableArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(App\Models\Article::class, 60)->create();
    }
}
