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
                    <div>
                        @if ((auth()->user()->id == $image->user->id) || auth()->user()->can('publish-image'))
                            <a class="btn btn--sm type--uppercase" href="{{ route('images.edit', [$image->album->uuid, $image->uuid] )}}">
                                <span class="btn__text">
                                    Edit 
                                </span>
                            </a>
                        @endif
                        @if(auth()->user()->id == $image->user->id)
                            <a class="btn btn--sm type--uppercase" href="#">
                                <span class="btn__text">
                                    Delete 
                                </span>
                            </a>
                            @if (!auth()->user()->can('publish-story'))
                                <a class="btn btn--sm type--uppercase" href="#">
                                    <span class="btn__text">
                                        Submit for Approval
                                    </span>
                                </a>
                            @endif
                        @endif
                        @if (auth()->user()->can('publish-image'))
                            <a class="btn btn--sm type--uppercase" href="#">
                                <span class="btn__text">
                                    Publish
                                </span>
                            </a>
                            <a class="btn btn--sm type--uppercase" href="#">
                                <span class="btn__text">
                                    Save to drafts
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection