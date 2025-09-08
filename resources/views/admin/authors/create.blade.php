@extends('admin.default')

@section('css')
    <style>
        .error { color: red; font-size: 0.875em; }
        .is-invalid { border-color: #dc3545; }
        .is-valid { border-color: #28a745; }
        .invalid-feedback { color: #dc3545; font-size: 0.875em; }
    </style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Author</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.author.index') }}">Authors</a></li>
                <li class="breadcrumb-item active">Add Author</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Author</h3>
            </div>
            <form action="javascript:void(0);" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="e.g., Jane Doe" value="{{ old('full_name') }}" required>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="nationality">Nationality</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="e.g., American" value="{{ old('nationality') }}">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="profile_image_url">Profile Image</label>
                            <input type="file" class="form-control" name="profile_image_url" id="profile_image_url">
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label class="form-label" for="biography">Biography</label>
                            <textarea class="form-control" name="biography" id="biography" rows="4" placeholder="Short biography or career highlights">{{ old('biography') }}</textarea>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <a href="{{ route('admin.author.index') }}" class="btn btn-light me-2"><i class="fas fa-times-circle"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $.validator.addMethod("extension", function(value, element, param) {
            if (this.optional(element)) {
                return true;
            }        
            var fileName = value.split('\\').pop();
            var extension = fileName.split('.').pop().toLowerCase();
            return param.split(',').indexOf(extension) > -1;
        }, "Only {0} files are allowed."); 

        $("#form").validate({
            rules: {
                full_name: {
                    required: true,
                    minlength: 2
                },
                profile_image_url: {
                    extension: "jpg,jpeg,png"
                }
            },
            messages: {
                full_name: {
                    required: "Please enter author's full name",
                    minlength: "Name must be at least 2 characters long"
                },
                profile_image_url: {
                    extension: "Please upload a valid image (jpg, jpeg, png, gif, webp)"
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
            }
        });
    });
</script>
@endsection
