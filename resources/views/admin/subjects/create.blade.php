@extends('admin.default')

@section('css')
<style>
    .error { color: red; font-size: 0.875em; }
    .is-invalid { border-color: #dc3545; }
    .is-valid { border-color: #28a745; }
</style>
@endsection

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Subject</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.subjects.index') }}">Subjects</a></li>
                <li class="breadcrumb-item active">Add Subject</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Subject</h3>
            </div>
            <form action="javascript:void(0);" method="POST" id="form">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="e.g., Science, Mathematics, English" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="code">Code</label>
                            <input type="text" name="code" id="code" class="form-control"
                                   placeholder="e.g., MATH101" value="{{ old('code') }}">
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Select Status --</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"
                                      placeholder="Brief description of the subject" rows="2">{{ old('description') }}</textarea>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <a href="{{ route('admin.subjects.index') }}" class="btn btn-light me-2"><i class="fas fa-times-circle"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            name: { required: true, minlength: 2 },
            code: { maxlength: 20 },
            status: { required: true }
        },
        messages: {
            name: { required: "Please enter the subject name", minlength: "Name must be at least 2 characters" },
            code: { maxlength: "Code must not exceed 20 characters" },
            status: { required: "Please select a status" }
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
