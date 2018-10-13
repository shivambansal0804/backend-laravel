<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Tag, Story};

class StoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $stories = auth()->user()->story()->latest()->get();

        $stories = Story::all();

        return $stories;
        
        return view('stories.index', ['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('stories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = [
            'title'             => $request->title,
            'body'              => $request->body,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'biliner'           => $request->biliner,
            'slug'              => str_slug($request->title, "-"),
            'cover'             => $request->cover
        ];

        $story = auth()->user()->story()->create($data);

        return redirect()->route('stories.show', $story->uuid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return 1;
        $story = auth()->user()->story()->whereUuid($uuid)->firstOrFail();

        return $story;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 1;
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
        return 2;
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
