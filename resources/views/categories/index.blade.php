@extends('layouts.app') 
@section('content')
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>All Categories</h1>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, nisi? Saepe, itaque error. Totam, fuga quia a
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
            <div class="col-md-8">
                <ul class="accordion accordion-2 accordion--oneopen">
                    @foreach ($categories as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->name}}
                        </span>
                        </div>
                        <div class="accordion__content">
                            <small>
                            Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
                            <div class="text-right d-block">
                                <a class="btn btn--sm m-0 type--uppercase"
                                    href="{{ route('categories.show', $item->slug) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>
                                @if (auth()->user()->can('update-category'))
                                    <a class="btn btn--sm m-0 type--uppercase"
                                        href="{{ route('categories.edit', $item->id) }}">
                                        <span class="btn__text">
                                            Edit
                                        </span>
                                    </a>
                                @endif @if (auth()->user()->can('delete-category'))
                                    <a class="btn btn--sm m-0 type--uppercase"
                                        href="{{ route('categories.index') }}" 
                                        onclick="event.preventDefault(); 
                                                 document.getElementById('delete-form').submit(); "
                                        >
                                        <span class="btn__text">
                                            Delete
                                        </span>
                                    </a>
                                    <form id="delete-form" action="{{ route('categories.destroy', $item->id )}}" method="POST">
                                        @csrf @method('DELETE')
                                    </form>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection