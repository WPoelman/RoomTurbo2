<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Room;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|             'owner_id'      => $this->faker->numberBetween($min = 1, $max = 1000),
*/

$factory->define(Room::class, function (Faker $faker) {
    return [
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraph,
            'size'          => $this->faker->numberBetween($min = 10, $max = 1000),
            'price'         => $this->faker->numberBetween($min = 10, $max = 1500),
            'type'          => $this->faker->randomElement($types = array (
                'Appartement',
                'Woonboot',
                'Studio',
                'Kamer'
            )),
            'zip_code'      => $this->faker->numerify('####AB'),
            'number'        => $this->faker->numberBetween($min = 1, $max = 600),
            'owner_id'      => ''
        ];
});
