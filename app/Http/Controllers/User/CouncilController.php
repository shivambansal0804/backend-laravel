<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Story, Category};
use App\Http\Requests\StoreStory;

class CouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('status', 'pending')->get();

        return view('users.council.index', ['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStory $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $story = Story::whereUuid($uuid)->with(['user', 'category'])->firstOrFail();

        return view('users.council.show', ['story' => $story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $story = Story::whereUuid($uuid)->with(['user', 'category'])->firstOrFail();
        $categories = Category::all();
        return view('users.council.edit', ['story' => $story, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStory $request, $uuid)
    {
        Story::whereUuid($uuid)->firstOrFail()->update($request->all());
        return redirect()->route('council.index');
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

    public function draft(StoreStory $request, $uuid)
    {
        $story = Story::where('Uuid', $uuid)->firstOrFail()->update([
            'status' => 'draft'
        ]);
        return redirect()->route('council.index');
    }

     public function publish($uuid)
    {
      $story = Story::whereUuid($uuid)->firstOrFail();

      $story->update([
        'status' => 'published'
      ]);

      return redirect()->route('blog.show', $story->slug);
    }
}
