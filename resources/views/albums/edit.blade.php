@extends('layouts.app')

@section('content')
<section class="cover cover-fullscreen height-101 cover-features imagebg space--lg" data-overlay="2">
    <div class="background-image-holder">
        <img alt="background" src="{{ $album->getFirstMediaUrl('covers', 'fullscreen') }}" />
     </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7">
                <h1>
                    Edit {{ $album->name }}
                </h1>
            
                <form method="POST" action="{{ route('albums.update', $album->uuid) }}" class="row" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : $album->name }}"
                          />
                    </div>
                     <div class="col-md-12">
                        <label>Biliner</label>
                        <input type="text" name="biliner" placeholder="Biliner" class="validate-required" value="{{ old('biliner') ? old('biliner') : '' }}"
                             />
                    </div>

                    <div class="col-md-12">
                        <label for="">Change Cover</label>
                        <input type="file" name="cover" id="">
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{__('Create new User')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
   
</section>


@endsection