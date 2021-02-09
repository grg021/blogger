<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class HomeBlogs extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.home-blogs', [
            'posts' => BlogPost::latest('publication_date')->paginate(10),
        ]);
    }
}
