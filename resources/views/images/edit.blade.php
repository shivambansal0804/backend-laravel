@extends('layouts.app')

@section('content')
    <section class="cover cover-fullscreen height-100 cover-features imagebg space--lg" data-overlay="2">
        <div class="background-image-holder">
            <img alt="background" src="{{ $image->getFirstMediaUrl('images', 'fullscreen')}}" />
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <h1>
                        {{ $image->name }}
                    </h1>
                    <p class="">
                        {{ $image->biliner }}
                    </p>
                    <p>
                        <span><small>by {{ $image->user->name }} , Posted in {{ $image->album->name }}</small></span>
                    </p>
                    
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection