@extends('layouts.app')

@section('content')
    <section class="cover height-100 cover-features imagebg space--lg" data-overlay="2">
        <div class="background-image-holder">
            <img alt="background" src="{{ $image->getFirstMediaUrl('images', 'fullscreen')}}" />
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <h1>
                        Heading Will be Here
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
@endsection