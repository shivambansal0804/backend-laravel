<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Tags, Story};

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Story::where('status', 'published')->latest()->paginate(30);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return Story::where(['slug'=> $slug, 'status' => 'published'])->firstOrFail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategory()
    {
        return Category::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategory($slug)
    {
        
        $category = Category::whereSlug($slug)->first();

        $stories = $category->story()->whereStatus('published')->latest()->get();

        return $stories;
    }
}
