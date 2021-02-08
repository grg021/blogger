<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {

        $data['blogs'] = BlogPost::latest('publication_date')->get();

        return view('home', $data);
    }
}
