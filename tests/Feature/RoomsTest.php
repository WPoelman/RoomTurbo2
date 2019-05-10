<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomsTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_add_room()
    {

        $this->withoutExceptionHandling();

        $room_info = [
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
            'owner_id'      => $this->faker->numberBetween($min = 1, $max = 20),
        ];

        $this->post('/rooms', $room_info);

        $this->assertDatabaseHas('rooms', $room_info);

    }
}
