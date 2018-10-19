<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Tag, Story};
use App\Http\Requests\StoreStory;
use Session;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Log;

class StoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stories = auth()->user()->story()->latest()->get();
        
        return view('stories.index', ['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Story';

        $story = auth()->user()->story()->create([
            'title' => $title,
            'slug' => str_slug($title, "-").'-'.rand(10, 9999)
        ]);

        return redirect()->route('stories.edit', $story->uuid );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $gi
     * @return \Illuminate\Http\Response
     */
    public function autoSave(Request $request)
    {
        $data = [
            'title'             => $request->title,
            'body'              => $request->body,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'biliner'           => $request->biliner,
        ];
        Log::info($data);
        $story = auth()->user()->story()->update($data);

        return response()->json('saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->with(['user', 'category'])->firstOrFail();            

        return view('stories.show', ['story' => $story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->with(['user', 'category'])->firstOrFail();

        if($story->status != 'draft'){
            session()->flash('success', $story->title.', is '.$story->status.'. You cannot edit it right now.');
            return redirect()->route('stories.show', $story->uuid );
        }

        $categories = Category::all();

        return view('stories.create', ['story' => $story, 'categories' => $categories ]);
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
        $data = [
            'title'             => $request->title,
            'body'              => $request->body,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'category_id'       => $request->category,
            'biliner'           => $request->biliner,
            'slug'              => str_slug($request->title, "-").'-'.rand(100, 999),
            'cover'             => $request->cover,
            'status'            => $request->status
        ];

        auth()->user()->story()->where('uuid' , $uuid)->first()->update($data);

        $request->session()->flash('success', $data['title'].', Updated!');
        
        return redirect()->route('stories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->firstOrFail();
        $title = $story->title;
        
        $story->delete();

        session()->flash('success', $title.', Deleted!');
        return redirect()->route('stories.index');
    }

   public function submit($uuid)
   {
       $story = auth()->user()->story()->whereUuid($uuid)->firstOrFail();
       
       $story->update([
           'status' => 'pending'
       ]);
    
       session()->flash('success', $story->title.', Submitted for approval.');
       return redirect()->route('stories.index');
   }
}
