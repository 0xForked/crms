<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween($min = 1, $max = 10),
        'slug' => $faker->slug,
        'title' => $faker->text($maxNbChars = 100) ,
        'content_text' => $faker->text($maxNbChars = 3000) ,
        'content_html' => $faker->text($maxNbChars = 3000) ,
        'status' => 'PUBLISH'
    ];
});
