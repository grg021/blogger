<?php

namespace App\View\Components;

use App\Models\BlogPost;
use Illuminate\View\Component;

class Post extends Component
{
    public $post;

    /**
     * Create a new component instance.
     *
     * @param $post
     */
    public function __construct(BlogPost $post)
    {
        //
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.post');
    }
}
