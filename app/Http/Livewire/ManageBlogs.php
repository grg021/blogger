<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ManageBlogs extends Component
{

    public $sortingOptions = [];
    public $sort = '-publication_date';

    use WithPagination;

    public function mount()
    {
        $this->sortingOptions = config('blogger.blog.sorting_options', []);
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function render()
    {

        $sortBy = ltrim($this->sort, '-');
        $sortDir = strpos($this->sort, '-') === 0 ? 'DESC' : 'ASC';

        return view('livewire.manage-blogs', [
            'posts' => auth()
                ->user()
                ->blogs()
                ->orderBy($sortBy, $sortDir)
                ->paginate(10)
        ]);
    }
}
