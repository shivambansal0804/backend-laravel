<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAlbum;
use App\Models\Album;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $albums = \App\Album::all();
        // $albums = auth()->user()->album()->latest()->get();
=======
        $albums = Album::all();
>>>>>>> 64af27acf4abad83247d80b971658e301df8f237
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

        $album = Album::whereUuid($uuid)->with('image')->first();

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
            'cover'             => $request->cover
        ];
        $album = Album::whereUuid($uuid)->firstOrFail();
        $album->update($data);

        if (isset($request['cover'])) {
        // $album -> remove image
            $album->clearMediaCollection('covers');
            $album->addMediaFromRequest('cover')->toMediaCollection('covers');
        } 

        return redirect()->route('albums.index');
    }
<<<<<<< HEAD
     public function submit($uuid)
   {
       $album = \App\Album::whereUuid($uuid)->firstOrFail();
       
       $album->update([
           'status' => 'pending'
       ]);

       session()->flash('success', $album->name.', Submitted for approval.');
       return redirect()->route('albums.index');
   }
=======

    public function submit($uuid)
    {
        $album = Album::whereUuid($uuid)->firstOrFail();
        
        $album->update([
            'status' => 'pending'
        ]);

        session()->flash('success', $album->name.', Submitted for approval.');
        return redirect()->route('albums.show', $album->uuid);
    }
>>>>>>> 64af27acf4abad83247d80b971658e301df8f237

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $album = auth()->user()->album()->whereUuid($uuid)->firstOrFail();
        $name = $album->name;
        
        $album->delete();

        session()->flash('success', $name.', Deleted!');
        return redirect()->route('albums.index');
    }
}
