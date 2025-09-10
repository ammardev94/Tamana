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
</style>
@endsection

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Partners</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">Partners</a></li>
                <li class="breadcrumb-item active">Add Partner</li>
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
                <h3 class="card-title">Add Partner</h3>
            </div>

            <form action="{{ route('admin.partners.store') }}" method="POST" id="addPartner" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="name">Partner Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter partner name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="thumbnail_img">Thumbnail Image</label>
                                <input type="file" class="form-control" name="thumbnail_img" id="thumbnail_img">
                                <img src="" alt="" style="max-width: 100%; height: 200px; display:none;">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="logo">Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                                <img src="" alt="" style="max-width: 100%; height: 200px; display:none;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

    $.validator.addMethod('extension', function (value, element, allowedExtensions) {
        var extension = value.split('.').pop().toLowerCase();
        return $.inArray(extension, allowedExtensions) !== -1;
    }, 'Invalid file type');

    $("#addPartner").validate({
        rules: {
            name: { required: true, minlength: 2 },
            thumbnail_img: { required: true, extension: ['jpg', 'jpeg', 'png', 'webp'] },
            logo: { required: true, extension: ['jpg', 'jpeg', 'png', 'webp'] }
        },
        messages: {
            name: { required: "Please enter partner name" },
            thumbnail_img: { required: 'Please upload a thumbnail image', extension: 'Only jpg, jpeg, png, webp allowed' },
            logo: { required: 'Please upload a logo', extension: 'Only jpg, jpeg, png, webp allowed' }
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

});
</script>
@endsection
