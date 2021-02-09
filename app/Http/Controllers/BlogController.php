<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogListRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogListRequest $request)
    {

        $data['sorting_options'] = config('blogger.blog.sorting_options', []);

        $sort_default = $request->session()->get('blog.sort', function () {
            return '-publication_date';
        });

        $data['sort'] = $request->input('sort', $sort_default);

        $request->session()->put('blog.sort', $data['sort']);

        $sortBy = ltrim($data['sort'], '-');
        $sortDir = strpos($data['sort'], '-') === 0 ? 'DESC' : 'ASC';

        $data['blogs'] = auth()
                            ->user()
                            ->blogs()
                            ->orderBy($sortBy, $sortDir)
                            ->get();

        return view('blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'publication_date' => 'required|date',
        ]);

        $request
            ->user()
            ->blogs()
            ->create([
                'title' => $request->title,
                'description' => $request->description,
                'publication_date' => $request->publication_date,
            ]);

        return redirect()->route('blogs.index')->with('status', 'blog-created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
