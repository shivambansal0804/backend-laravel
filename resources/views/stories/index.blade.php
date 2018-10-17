@extends('layouts.app')

@section('content')

<section class="text-center space--md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="typed-headline">
                    <span class="h2 inline-block">Your all Stories</span>
                    {{-- <span class="h2 inline-block typed-text typed-text--cursor color--primary" data-typed-strings="Stories"></span> --}}
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <hr> @foreach ($stories as $item)
                <div class="row">
                    <div class="col-md-8">
                        <p class="lead mb-0">
                            {{$item->title}}
                        </p>
                        {{-- <span class="text-small">
                                {{ substr($item->biliner, 0, 90) }}
                            </span> --}}
                        <div class="">
                            <small>
                                Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
                        </div>
    
                    </div>
                    <div class="col-md-3 text-right text-center-xs">
                        <a class="btn type--uppercase" href="{{route('stories.show', $item->uuid)}}">
                            <span class="btn__text">
                                Read Article
                            </span>
                        </a>
                        <a class="btn" href="{{ route('stories.index') }}" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                            <i class="material-icons">comment</i>
                        </a>

                        @if ($item->status == 'draft')
                        <form id="delete-form" class="" action="{{route('stories.destroy', $item->uuid)}}" method="post">
                            @csrf @method('DELETE')
                        </form>
                        @endif
                    </div>
                    {{-- <div class="col-md-1 pt-2">
                        
                    </div>
                    <div class="col pt-2 text-center">
                        <span class="badge p-1 @if($item->status == 'draft') badge-primary @elseif($item->status == 'published') badge-success @else badge-dark @endif">{{ $item->status }}</span>
                    </div> --}}
                    {{--
                    <div>{{ $item->slug }}</div>
                    <div>{!! substr($item->body, 0, 90) !!}{{ strlen(strip_tags($item->body)) > 250 ? '...' : "" }}</div>
                    --}}
                </div>

                <hr class=""> @endforeach
            </div>
        </div>
    </div>
</section>
@endsection