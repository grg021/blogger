<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BlogFetchTest extends TestCase
{

    use RefreshDatabase, DatabaseMigrations;

    public function test_system_can_fetch_blogs()
    {
        $this->seed();

        $posts['data'][] = [
            'title' => 'Test Title',
            'description' => 'Description',
            'publication_date' => date('Y-m-d')
        ];

        Http::fake(function ($request) use ($posts) {
            return Http::response($posts, 200);
        });


        $this->assertCount(0, BlogPost::all());

        $this->artisan('blogs:fetch')
            ->assertExitCode(0);

        $this->assertNotCount(0, BlogPost::all());

    }

}
