@extends('layouts.app') 

@section('links')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/url" method="POST"></form>
            <form action="{{ route('stories.store') }}" method="POST">
                @csrf

                <div class="custom-input">
                    <input type="text" class="custom-input__input custom-size-1" placeholder="Give this Story some title" autocomplete="off" name="title" required>
                </div>

                <hr class="mt-0">
                
            
                <div class="form-group">
                    <input type="text" class="custom-input__input " placeholder="Biliners sells the story, give this a biliner." autocomplete="off" name="biliner"
                        required>
                </div>
                
                <hr class="mb-0 mt-3">
                <div class="custom-input">
                    <textarea id="summernote" name="body"></textarea>
                </div>

                <hr>

                <div class="custom-input">
                    <select name="category" class="form-control ">
                        <option value="">Give this story a Category</option>
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
                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" placeholder="Meta Description here"></textarea>
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
                       <textarea name="meta_title" id="" cols="30" rows="3" class="form-control" placeholder="Meta Title here"></textarea>
                    </div>
                </div>
                <br>
                <hr>
                <div class="form-group row">
                    <button type="submit" name="status" class="form-control btn btn-primary col-md-3" value="draft">Save as draft</button>
                    <button type="submit" name="status" class="form-control btn btn-success  col-md-4 ml-1" value="pending">Create and Submit for Approval</button>
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