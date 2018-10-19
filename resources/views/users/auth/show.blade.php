@extends('layouts.app') 
@section('content')
@php
    $user = auth()->user();
@endphp
<section class="switchable feature-large">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-4 col-sm-6">
                <img alt="Image" class="border--round" src="{{ $user->getFirstMediaUrl('avatars', 'thumb') }}" />
            </div>
            <div class="col-md-7 offset-md-1 col-lg-5">
                <div class="switchable__text">
                    <div class="text-block">
                        <h2>{{ $user->name }}</h2>
                        <span>@foreach ($user->roles as $item) {{$item->name}} @endforeach</span> 
                    </div>
                    <p class="lead">
                        {{ $user->bio }}
                        <hr>
                        <span>Joined <strong>{{ $user->created_at->diffForHumans() }}</strong></span>
                    </p>
                    <ul class="social-list list-inline list--hover">
                        <li>
                            <a href="{{ $user->display_mail }}">
                                <i class="socicon socicon-mail icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->medium }}">
                                <i class="socicon socicon-medium icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->linkedin }}">
                                <i class="socicon socicon-linkedin icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->instagram }}">
                                <i class="socicon socicon-instagram icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user->facebook }}">
                                <i class="socicon socicon-facebook icon icon--xs"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="section space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="boxed boxed--border">
                    <ul class="row row--list clearfix text-center">
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Likes</span>
                            <span class="h3">220</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Articles</span>
                            <span class="h3">14</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Comments</span>
                            <span class="h3">2,129</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Following</span>
                            <span class="h3">119</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center height-50">
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <h1>History</h1>
                <p class="lead">
                    An innovative collective of like-minded folks making useful and enduring technology products
                </p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="process-1">
                    <div class="process__item">
                        <h4>An idea becomes a budding
                            <br> hobby business &mdash; 2012</h4>
                        <img alt="Image" src="img/cowork-3.jpg" class="border--round" />
                        <p>
                            Stack is built with customization and ease-of-use at its core — whether you're a seasoned developer or just starting out,
                            you'll be making attractive sites faster than any traditional HTML template.
                        </p>
                    </div>
                    <div class="process__item">
                        <h4>Succsessfully funded through
                            <br> Bray Investments</h4>
                        <img alt="Image" src="img/cowork-1.jpg" class="border--round" />
                        <p>
                            Stack is built with customization and ease-of-use at its core — whether you're a seasoned developer or just starting out,
                            you'll be making attractive sites faster than any traditional HTML template.
                        </p>
                    </div>
                    <div class="process__item">
                        <h4>Posted Profit Q2 2015</h4>
                        <img alt="Image" src="img/cowork-5.jpg" class="border--round" />
                        <p>
                            Stack is built with customization and ease-of-use at its core — whether you're a seasoned developer or just starting out,
                            you'll be making attractive sites faster than any traditional HTML template.
                        </p>
                    </div>
                </div>
                <!--end process-->
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@endsection