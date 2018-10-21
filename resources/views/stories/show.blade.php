@extends('layouts.app') 
@section('content')

<section class="cover cover-features imagebg space--lg" data-overlay="2">
    <div class="background-image-holder">
        <img src="/img/work-1.jpg" alt="">
        {{-- <img alt="background" src="{{ $image->getFirstMediaUrl('images', 'fullscreen')}}" /> --}}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-7">
                <h1>
                    {{ $story->title }}
                </h1>
                <p class="lead">
                   {{ $story->biliner }}
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
            <div class="col-md-10 col-lg-8">
                <article> 
                    <div class="article__title">
                        <span>{{ $story->created_at->diffForHumans()}}, </span>
                        <span class="
                                @if($story->status == 'draft') text-warning
                                @elseif($story->status == 'published') text-success
                                @else badge-dark @endif">
                            {{ $story->status }}
                        </span>
                    </div>

                    <div class="article__body">
                        <p class="small">
                            <small>{{ $story->biliner }}</small>
                        </p>
                        <p>
                            {!! $story->body !!}
                        </p>
                        @if ($story->status == 'draft')
                        <div>
                            <a class="btn btn--primary btn--sm" href="{{ route('stories.edit', $story->uuid)}}">
                                <span class="btn__text">Edit</span>
                            </a>
                            <a class="btn btn--sm" href="{{ route('stories.submit', $story->uuid )}}">
                                <span class="btn__text">Submit for Approval</span>
                            </a>
                            <a class="btn btn--sm" href="{{ route('stories.index' )}}" onclick="event.preventDefault();
                                                            document.getElementById('delete-form').submit();">
                                <span class="btn__text">Delete</span>
                            </a>
                            <form id="delete-form" action="{{route('stories.destroy', $story->uuid)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </div>                            
                        @endif
                        
                        <hr>
                        @if ($story->category)
                            <small>
                                Posted in <a href="{{ route('categories.show', $story->category->slug)}}">{{ $story->category->name }}</a>
                            </small>
                        @endif
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection


