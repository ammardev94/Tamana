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
                <li class="breadcrumb-item active">Edit Partner</li>
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
                <h3 class="card-title">Edit Partner</h3>
            </div>

            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" id="editPartner" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="name">Partner Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter partner name" value="{{ old('name', $partner->name) }}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="thumbnail_img">Thumbnail Image</label>
                                <input type="file" class="form-control" name="thumbnail_img" id="thumbnail_img">
                                @if($partner->thumbnail_img)
                                    <img src="{{ asset('storage/'. $partner->thumbnail_img) }}" alt="Thumbnail" style="max-width: 100%; height: 150px; margin-top: 10px;">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="logo">Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/'. $partner->logo) }}" alt="Logo" style="max-width: 100%; height: 150px; margin-top: 10px;">
                                @endif
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
        if (value === '') return true; // allow empty for edit
        var extension = value.split('.').pop().toLowerCase();
        return $.inArray(extension, allowedExtensions) !== -1;
    }, 'Invalid file type');

    $("#editPartner").validate({
        rules: {
            name: { required: true, minlength: 2 },
            thumbnail_img: { extension: ['jpg', 'jpeg', 'png', 'webp'] },
            logo: { extension: ['jpg', 'jpeg', 'png', 'webp'] }
        },
        messages: {
            name: { required: "Please enter partner name" },
            thumbnail_img: { extension: 'Only jpg, jpeg, png, webp allowed' },
            logo: { extension: 'Only jpg, jpeg, png, webp allowed' }
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
