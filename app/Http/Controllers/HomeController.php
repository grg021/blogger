<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index', [
            'blogs' => BlogPost::latest('publication_date')->get()
        ]);
    }

    public function show(BlogPost $blogPost)
    {
        return view('home.show', compact('blogPost'));
    }

}
