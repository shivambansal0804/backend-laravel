@extends('layouts.app')

@section('content')

<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <h1>Your Uploaded Images In this Album</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section>
    <div class="masonry masonry--gapless">
        <div class="masonry-filter-container text-center row justify-content-center align-items-center">
            <div class="masonry-filter-holder">
                <div class="masonry__filters" data-filter-all-text="All Images"></div>
            </div>
        </div>
        <div class="masonry__container ">
            @foreach ($images as $item)
                <div class="col-md-4 col-12 masonry__item" data-masonry-filter="{{ $item->status }}">
                    <div class="project-thumb hover-element height-40">
                        <a href="#">
                            <div class="hover-element__initial">
                                <div class="background-image-holder">
                                    <img alt="background" src="{{ $item->getFirstMediaUrl('images', 'fullscreen') }}" />
                                </div>
                            </div>
                            <div class="hover-element__reveal" data-overlay="9">
                                <div class="project-thumb__title">
                                    <h5>{{ $item->name }}</h5>
                                    <span>{{ $item->biliner }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!--end of masonry__container-->
    </div>
    <!--end of masonry-->
</section>

@endsection