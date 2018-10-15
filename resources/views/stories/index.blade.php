@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Stories</h2>
                <hr> 

                @foreach ($stories as $item)
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mb-0"><a class="t-black" href="{{route('stories.show', $item->uuid)}}">{{$item->title}}</a> </h5>
                        <span class="text-small">
                            {{ substr($item->biliner, 0, 90) }}
                        </span>
                        <div class="mt-1">
                            <small>
                                Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
                        </div>
                        
                    </div>
                    <div class="col-md-1 pt-2">
                        @if ($item->status == 'draft')
                            <form class="" action="{{route('stories.destroy', $item->uuid)}}" method="post">
                                @csrf @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-link p-0">
                            </form>
                        @endif
                    </div>
                    <div class="col-md-1 pt-2" style="margin-top:.2rem;">
                        <a class="t-black" href="{{route('stories.show', $item->uuid)}}">Show</a>
                    </div>
                    <div class="col pt-2 text-center">
                        <span class="badge p-1 @if($item->status == 'draft') badge-primary @elseif($item->status == 'published') badge-success @else badge-dark @endif">{{ $item->status }}</span>
                    </div>
                    {{-- 
                    <div>{{ $item->slug }}</div>
                    <div>{!! substr($item->body, 0, 90) !!}{{ strlen(strip_tags($item->body)) > 250 ? '...' : "" }}</div>
                    --}}
                </div>
                <hr class="mt-2">
                @endforeach
            </div>
        </div>
    </div>
@endsection