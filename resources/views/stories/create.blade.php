@extends('layouts.app') 

@section('links')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Post
                </div>

                <div class="card-body">
                    <form action="{{ route('stories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="biliner"> Biliner </label>
                            <input type="text" class="form-control" name="biliner" required>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-md-4 text-md-right">Category</label>
                        
                            <select name="category" class="form-control col-md-6">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{$item->name}}">{{$item->display_name}}</option>
                                                    @endforeach
                                                </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="body" class="control-label">Body</label>
                            <textarea id="summernote" name="body"></textarea>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="" class="label">meta title</label>
                                <textarea name="meta_title" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="" class="label">meta Des</label>
                                <textarea name="meta_description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-secondary" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() { $('#summernote').summernote(); });
    </script>

@endsection