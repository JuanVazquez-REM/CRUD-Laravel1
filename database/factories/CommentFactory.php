<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1,10),
        'nombre' => $faker->title,
        'email' => $faker->unique()->safeEmail,
        'contenido' => $faker->paragraph,
    ];
});