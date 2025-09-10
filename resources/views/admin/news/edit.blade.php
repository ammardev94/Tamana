{{-- resources/views/admin/news/edit.blade.php --}}
@extends('admin.default')

@section('css')
<style>
    .error {
        color: red;
        font-size: 0.875em;
    }
    .is-invalid {
        border-color: #dc3545;
    }
    .is-valid {
        border-color: #28a745;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
    }
    .note-editor.note-frame .note-editing-area .note-editable {
        height: 200px !important;
    }
</style>
@endsection

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">News</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">News</a></li>
                <li class="breadcrumb-item active">Edit News</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit News</h3>
            </div>

            <form action="{{ route('admin.news.update', [$news->id]) }}" method="POST" id="editNews" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">

                        {{-- Title --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter title"
                                value="{{ old('title', $news->title) }}">
                        </div>

                        {{-- Author Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="author_name">Author Name</label>
                            <input type="text" name="author_name" id="author_name" class="form-control"
                                placeholder="Enter author name"
                                value="{{ old('author_name', $news->author_name) }}">
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" name="description">{{ old('description', $news->description) }}</textarea>
                        </div>

                        {{-- Author Social Links --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="author_youtube">Author YouTube</label>
                            <input type="url" name="author_youtube" id="author_youtube" class="form-control"
                                placeholder="http://"
                                value="{{ old('author_youtube', $news->author_youtube) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="author_facebook">Author Facebook</label>
                            <input type="url" name="author_facebook" id="author_facebook" class="form-control"
                                placeholder="http://"
                                value="{{ old('author_facebook', $news->author_facebook) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="author_linkdin">Author LinkedIn</label>
                            <input type="url" name="author_linkdin" id="author_linkdin" class="form-control"
                                placeholder="http://"
                                value="{{ old('author_linkdin', $news->author_linkdin) }}">
                        </div>


                        {{-- Author Image --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="author_img">Author Image</label>
                            <input type="file" name="author_img" id="author_img" class="form-control" accept="image/*">
                            <input type="hidden" id="existingAuthorImg" value="{{ $news->author_img }}">
                            @if($news->author_img)
                                <img src="{{ asset('storage/'.$news->author_img) }}" style="max-width:100%; height:150px;" alt="Author Image">
                            @endif
                        </div>

                        {{-- Main Image --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="img">Main Image</label>
                            <input type="file" name="img" id="img" class="form-control" accept="image/*">
                            <input type="hidden" id="existingImage" value="{{ $news->img }}">
                            @if($news->img)
                                <img src="{{ asset('storage/'.$news->img) }}" style="max-width:100%; height:150px;" alt="News Image">
                            @endif
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(function(){
    $('#description').summernote({
        height: 200,
        placeholder: 'Enter description',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['codeview']]
        ]
    });

    $('input[type="file"]').on('change', function(e){
        var input = $(this);
        var file = input[0].files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(e){
                input.siblings('img').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(file);
        }
    });

    $.validator.addMethod('extension', function (value, element, allowedExtensions) {
        var extension = value.split('.').pop().toLowerCase();
        return $.inArray(extension, allowedExtensions) !== -1;
    }, 'Invalid file type');


    $("#editNews").validate({
        rules: {
            title: { required: true, minlength: 3 },
            author_name: { required: true, minlength: 3 },
            description: { required: true, minlength: 20 },
            author_youtube: { url: true },
            author_facebook: { url: true },
            author_linkdin: { url: true },
            img: { 
                required: function() {
                    return $('#existingImage').val();
                },
                extension: ['jpg', 'jpeg', 'png'] 
            },
            author_img: { 
                required: function() {
                    return $('#existingAuthorImg').val();
                },
                extension: ['jpg', 'jpeg', 'png'] 
            }
        },
        messages: {
            title: {
                required: "Please enter the news title",
                minlength: "Title must be at least 3 characters long"
            },
            author_name: {
                required: "Please enter the author name",
                minlength: "Author name must be at least 3 characters long"
            },
            description: {
                required: "Please enter the description",
                minlength: "Description must be at least 20 characters long"
            },
            author_youtube: { url: "Please enter a valid URL" },
            author_facebook: { url: "Please enter a valid URL" },
            author_linkdin: { url: "Please enter a valid URL" },
            img: {
                required: "Please upload a main image.",
                extension: "Only jpg, jpeg, and png files are allowed."
            },
            author_img: {
                required: "Please upload an author image.",
                extension: "Only jpg, jpeg, and png files are allowed."
            }
        },
        errorElement: "label",
        validClass: "is-valid",
        errorClass: "is-invalid text-danger",
        highlight: function(element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        },
        submitHandler: function(form) {
            $('#description').val($('#description').summernote('code'));
            form.submit();
        }
    });
});
</script>
@endsection
