<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {
        $images = auth()->user()->album()->whereUuid($uuid)->firstOrFail()->image()->get();

        return $images;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid)
    {
        return view('images.create',  [ 'album_uuid' => $uuid ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImage $request, $uuid)
    {
        $image = auth()->user()->album()->whereUuid($uuid)->firstOrFail()->image()->create([
            'user_id' => auth()->user()->id
        ]);

        if($request->hasFile('image')) {
            $image->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('images.show', [$uuid, $image->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($uuid /** Album Uuid */, $image /** Image Uuid */)
    {
        $item = \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->whereUuid($image)->with('user')->firstOrFail();
        return view('images.show', ['image' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
