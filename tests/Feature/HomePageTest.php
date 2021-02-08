<?php

namespace Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_can_view_blogs()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_guests_can_view_a_blog()
    {

        $user = User::factory()
            ->hasBlogs()
            ->create();

        $response = $this->get('/posts/' . $user->blogs()->first()->value('slug'));

        $response->assertStatus(200);
    }

}

