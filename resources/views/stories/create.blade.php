@extends('layouts.app') 
@section('links')
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
@endsection
 
@section('content')

<section id="" class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <span id="status"></span>
                <form action="{{ route('stories.update', $story->uuid) }}" method="POST" class="row">
                    @csrf @method('PUT')

                    <div class="col-md-12">
                        <input type="text" class="custom__input custom__input--text size--1" placeholder="New Story" autocomplete="off" name="title"
                            value="{{ old('title') ? old('title'): $story->title }}" required>
                    </div>

                    <div class="col-md-12">
                        <textarea type="text" id="biliner" class="custom__input custom__input--resize-n" rows="2" placeholder="Biliners sells the story, give this a biliner."
                            autocomplete="off" name="biliner" required>{{ old('biliner') ? old('biliner'): $story->biliner }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <textarea class="body border-n" id="body" name="body">{!! old('body') ? old('body'): $story->body !!}</textarea>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <h3>SEO Details</h3>
                    </div>
                    <div class="col-md-12">
                        <select name="category" class="">
                            <option value="">Give this story a Category</option>
                            @if ($story->category)
                                <option value="{{ $story->category->name }}">{{$story->category->display_name}}</option>
                            @endif
                                
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->display_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" placeholder="Meta Description here" required>{{ old('meta_description') ? old('meta_description'): $story->meta_description }}</textarea>
                    </div>
                    
                    <div class="col-md-12">
                        <textarea name="meta_title" id="" cols="30" rows="3" class="form-control" placeholder="Meta Title here" required>{{ old('meta_title') ? old('meta_title'): $story->meta_title }}</textarea>
                    </div>

                    <div class="col-sm-6 col-xs-6 col-md-4">
                        <button class="btn btn--primary btn--icon d-inline" type="submit" name="status" value="draft">
                            <span class="btn__text"><i class="icon-Add-File"></i>Save as Draft</span>
                        </button>
                    </div>

                    <div class="col-sm-6 col-xs-6 col-md-4">  
                        <button class="btn btn-success text-white btn--icon d-inline" type="submit" name="status" value="pending">
                            <span class="btn__text"><i class="icon-Add-File"></i>Submit for approval</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->

</section>
@endsection
 
@section('scripts')

<script>
    $(document).ready(function() {
        var editor;
        ClassicEditor
				.create(document.querySelector( '#body' ), {
                    removePlugins: [ 
                        'Image', 'EasyImage', 'ImageCaption', 'ImageCaption', 'TableToolbar', 'Table',
                        'MediaEmbed', 'ImageUpload', 'CKFinderUploadAdapter'
                    ],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'alignment',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            'imageUpload',
                            'blockQuote',
                            'undo',
                            'redo'
                        ]
                    }
                    
                } )
				.then( e => {
                    editor = e;
				} )
				.catch( error => {
					console.error( 'error' );
                } );
                
           
        function wordCount(ele)
        {
            var regex = /(<([^>]+)>)/ig;
            var string = ele.trim().replace(regex, ' ').replace(/&nbsp;/g, ' ').replace(/  +/g, ' ');
            var num = string.trim().split(' ').length;
            return num;
        }

        
        setInterval(() => {
            changeStatus('Saving....')
            
            autoSave();
        }, 50000);

        function changeStatus(text) {
            var elem = $('#status');
            elem.text(text);
            setTimeout(() => {
                elem.text('');
            }, 5000);
        }

        function autoSave() {
            const URL = '{{ route('stories.autosave', $story->uuid )}}'
             var save = $.ajax(URL, {
                method: 'PUT',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'title': $('input[name="title"]').val(),
                    'body': editor.getData(),
                    'biliner': $('textarea[name="biliner"]').val(),
                    'meta_title': $('textarea[name="meta_title"]').val(),
                    'meta_description': $('textarea[name="meta_description"]').val(),
                },
                success : function(data) {
                    if ((data.error)) {
                        console.log(data.error)
                    }
                    else{
                        changeStatus('Saved')
                    }
                }
            })
        }

        var wordsInLine = 17;

        var bilinerRow = 2;

        var biliner = $('#biliner');
        biliner.keyup(function () {
            var count = wordCount($('#biliner').val());
            var row = count / wordsInLine;
            $(this).attr('rows', row + 1);
            bilinerRow = row            
        })
        
        });
</script>
@endsection