<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAlbum;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = \App\Models\Album::all();
        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbum $request)
    {
        $album = auth()->user()->album()->create([
            'name' => $request->name
        ]); 

        if (isset($request['cover'])) {
            $album->addMediaFromRequest('cover')->toMediaCollection('covers');
        } 

        return redirect()->route('albums.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $images = [];

        $album = \App\Models\Album::whereUuid($uuid)->with('image')->first();

        $subs = $album->child()->get();

        return view('albums.show', ['album' => $album, 'subs' => $subs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $album = auth()->user()->album()->whereUuid($uuid)->with(['image'])->firstOrFail();
        $subs = $album->child()->get();
        if($album->status != 'draft'){
            session()->flash('success', $album->title.', is '.$album->status.'. You cannot edit it right now.');
            return redirect()->route('albums.show', ['album' => $album, 'subs' => $subs]);
        }

        

        return view('albums.edit', ['album' => $album, 'subs' => $subs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
         $data = [
            'name'             => $request->name,
            'biliner'           => $request->biliner,
            'status'            => $request->status,
            'cover'             => $request->cover
        ];
        $album = \App\Album::whereUuid($uuid)->firstOrFail();
        $album->update($data);

        if (isset($request['cover'])) {
            // $album -> remove image
            $album->clearMediaCollection('covers');
            $album->addMediaFromRequest('cover')->toMediaCollection('covers');
        } 

        return redirect()->route('albums.index');
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
