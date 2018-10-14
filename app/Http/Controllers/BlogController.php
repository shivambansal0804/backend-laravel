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
}
