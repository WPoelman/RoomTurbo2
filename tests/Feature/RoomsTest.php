<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Room;
use App\User;

class RoomsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_room()
    {

        $this->withoutExceptionHandling();

        // Given a logged in user
        $user = factory(User::class)->create();

        $this->actingAs($user);


        // When the user hits the endpoint, they should create a new room with validated data
        $room_info = factory(Room::class)->make(['owner_id' => $user->id])->toArray();

        $this->post('/rooms', $room_info);

        $this->assertDatabaseHas('rooms', $room_info);
        echo 'User can create room';

    }

}
