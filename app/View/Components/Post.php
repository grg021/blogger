<?php

namespace App\View\Components;

use App\Models\BlogPost;
use Illuminate\View\Component;

class Post extends Component
{

    public string $type;

    public BlogPost $post;

    /**
     * Create a new component instance.
     *
     * @param  BlogPost  $post
     * @param  string  $type
     */
    public function __construct(BlogPost $post, $type = 'FULL')
    {
        $this->post = $post;
        $this->type = $type;
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
