@extends('admin.default')

@section('css')
<style>
    .error { color: red; font-size: 0.875em; }
    .is-invalid { border-color: #dc3545; }
    .is-valid { border-color: #28a745; }
    .invalid-feedback { color: #dc3545; font-size: 0.875em; }
    .note-editor.note-frame .note-editing-area .note-editable {
        height: 200px !important;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Service</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                <li class="breadcrumb-item active">Add Service</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Service</h3>
            </div>

            <form action="{{ route('admin.services.store') }}" method="POST" id="addService" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Enter service title">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="link">Link</label>
                                <input type="url" class="form-control" name="link" id="link" value="{{ old('link') }}" placeholder="https://example.com">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <textarea id="description" name="description">{{ old('description') }}</textarea>
                            </div>
                            <label class="error" for="description"></label>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="img">Image</label>
                                <input type="file" class="form-control" name="img" id="img">
                                <img src="" alt="" style="max-width: 100%; height: 200px; display:none;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#addService").validate({
        rules: {
            title: { required: true, minlength: 3 },
            description: { required: true, minlength: 10 },
            img: { required: true, extension: ['jpg','jpeg','png'] },
            link: { url: true }
        },
        messages: {
            title: { required: "Please enter service title" },
            description: { required: "Please enter description" },
            img: { required: "Please upload an image", extension: "Only jpg, jpeg, png allowed" },
            link: { url: "Please enter a valid URL" }
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

    $('input[type="file"]').on('change', function() {
        var input = $(this);
        var file = input[0].files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                input.siblings('img').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#description').summernote({
        height: 200,
        placeholder: 'Enter description',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['view', ['codeview']]
        ]
    });
});
</script>
@endsection
