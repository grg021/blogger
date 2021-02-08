<?php

namespace Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogManageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_render_manage_blogs()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/blogs');

        $response->assertOk();
    }

    public function test_user_can_render_create_blogs()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/blogs/create');

        $response->assertOk();
    }

    public function test_user_can_create_a_blog()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/blogs', [
            'title' => 'Test Title',
            'description' => 'Description',
            'publication_date' => '01/01/2021'
        ]);

        $response->assertRedirect('/blogs');
        $this->assertCount(1, $user->blogs);

    }

}
