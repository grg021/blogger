<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {

        return view('blogs.index', [
            'blogs' => BlogPost::latest('publication_date')->get()
        ]);
    }

    public function show(BlogPost $blogPost)
    {
        return view('blogs.show', compact('blogPost'));
    }

}
