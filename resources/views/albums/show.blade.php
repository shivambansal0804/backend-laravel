@extends('layouts.app')

@section('content')
<section class="cover height-100 cover-features imagebg space--lg" data-overlay="2">
    <div class="background-image-holder">
        <img alt="background" src="{{ $album->getFirstMediaUrl('covers', 'fullscreen') }}" />
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7">
                <h1>
                    {{ $album->name }}
                </h1>
                <p class="lead">
                    Stack offers a clean and contemporary look to suit a range of purposes from corporate, tech startup, marketing site to digital
                    storefront.
                </p>
                <a class="btn btn--sm type--uppercase" href="#">
                        <span class="btn__text">
                            Edit 
                        </span>
                    </a>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class="unpad">
    <div class="masonry masonry--gapless">
        <div class="masonry__container">
            @php
                $open = false;
                $first  = true;
                $i = 0;
            @endphp
            @foreach ($album->image as $item)

                
                <div class="masonry__item {{ ($open) ? 'col-lg-8' : 'col-lg-4' }} col-md-6 col-12" data-masonry-filter="Digital">
                    <div class="project-thumb hover-element height-50">
                        <a href="{{ route('images.show', [$album->uuid, $item->uuid ])}}">
                            <div class="hover-element__initial">
                                <div class="background-image-holder">
                                    <img alt="background" src="{{ $item->getFirstMediaUrl('images', 'fullscreen') }}" />
                                </div>
                            </div>
                            <div class="hover-element__reveal" data-overlay="9">
                                <div class="project-thumb__title middle text-center">
                                    <h5>Name </h5>
                                    <span>{{ $item->biliner }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
            {{-- Dynamic width of col --}}
            @php
                if($first) {
                    $first = false;
                    $open = true;
                }
                else{
                    if ($loop->index == ($i + 2) ) { 
                        $open = !$open; 
                        $i += 2; 
                    } 
                } 
            @endphp
        @endforeach
        <!--end of masonry container-->
    </div>
    <!--end masonry-->
</section>
@endsection