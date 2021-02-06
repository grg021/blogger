<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPostTest extends TestCase
{

    use RefreshDatabase;

    public function test_can_create_blog_posts_from_data()
    {

        $this->seed();

        $data['data'][] = [
            'title' => 'Test Title',
            'description' => 'Description',
            'publication_date' => date('Y-m-d')
        ];

        BlogPost::createFromData($data);

        $blog = BlogPost::find(1);

        $this->assertNotNull($blog);
        $this->assertEquals('Test Title', $blog->title);
    }

    public function test_cannot_create_from_invalid_data()
    {

        $data = [];

        BlogPost::createFromData($data);

        $blog = BlogPost::find(1);

        $this->assertNull($blog);

    }

    public function test_blog_post_can_create_post_as_admin()
    {

        $post = [
            'title' => 'Test Title',
            'description' => 'Description',
            'publication_date' => date('Y-m-d')
        ];

        $user = User::factory()->systemAdmin()->create();

        BlogPost::createAsAdmin($post);

        $blog = BlogPost::find(1);

        $this->assertNotNull($blog);

        $this->assertEquals('Test Title', $blog->title);
        $this->assertEquals($user->id, $blog->user_id);

    }

}
