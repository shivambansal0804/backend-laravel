@extends('layouts.app') 
@section('links')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('stories.update', $story->uuid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="custom-input">
                    <input type="text" value="{{ old('title') ? old('title'): $story->title }}" class="custom-input__input custom-size-1" placeholder="Give this Story some title" autocomplete="off"
                        name="title" required>
                </div>
    
                <hr class="mt-0">
    
    
                <div class="form-group">
                    <input type="text" value="{{ old('biliner') ? old('biliner'): $story->biliner }}" class="custom-input__input " placeholder="Biliners sells the story, give this a biliner." autocomplete="off"
                        name="biliner" required>
                </div>
    
                <hr class="mb-0 mt-3">
                <div class="custom-input">
                    <textarea id="summernote" name="body">{!! old('body') ? old('body'): $story->body !!}</textarea>
                </div>
    
                <hr>
    
                <div class="custom-input">
                    <select name="category" class="form-control ">
                            {{-- <option value="{{ old('category') ? old('category'): '' }}">Seld</option> --}}
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                </div>
    
                <br>
    
                <h3>SEO</h3>
    
                <hr>
    
                <div class="row">
                    <div class="col-md-4 text-center pt-1">
                        <img src="{{ asset('svg/computer.svg')}}" alt="" srcset="" width="50">
                        <div class="mt-1">
                            <strong>Meta Description</strong>
                        </div>
                    </div>
                    <div class="col">
                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" placeholder="Meta Description here">{{ old('meta_description') ? old('meta_description'): $story->meta_description }}</textarea>
                    </div>
                </div>
    
                <br>
    
                <div class="row">
                    <div class="col-md-4 text-center pt-1">
                        <img src="{{ asset('svg/computer.svg')}}" alt="" srcset="" width="50">
                        <div class="mt-1">
                            <strong>Meta Title</strong>
                        </div>
                    </div>
                    <div class="col">
                        <textarea name="meta_title" id="" cols="30" rows="3" class="form-control" placeholder="Meta Title here">{{ old('meta_title') ? old('meta_title'): $story->meta_title }}</textarea>
                    </div>
                </div>
                <br>
                <hr>
                <div class="form-group row">
                    <input type="submit" class="form-control btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
     $(document).ready(function() {
            $('#summernote').summernote({
            height: 300,
            placeholder: 'Write Description here',
            toolbar: [ 
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']], 
                ['font', ['strikethrough', 'fontname']], 
                ['fontsize', ['fontsize']], ['color', ['color']], 
                ['para', ['ul', 'ol', 'paragraph']], 
                ['height',['height']],
                ['link', ['link']]
            ],
            popover: {
                // link: [ ['link', ['linkDialogShow', 'unlink']] ],
            },
            
        }); 
        
        });
</script>
@endsection