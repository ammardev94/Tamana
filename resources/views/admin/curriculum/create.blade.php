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
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <h3 class="page-title">Add Curriculum</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.curriculum.index') }}">Curriculum</a></li>
            <li class="breadcrumb-item active">Add Curriculum</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Curriculum Details</h3>
    </div>
    <form action="javascript:void(0);" method="POST" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="E.g., CBSE, IB, State Board" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="E.g., CBSE, IB">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="E.g., India, Global">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">-- Select Status --</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="col-md-12 form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="E.g., Curriculum followed in CBSE-affiliated schools."></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.curriculum.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            name: { required: true, minlength: 2 },
            code: { maxlength: 10 },
            country: { maxlength: 100 },
            status: { required: true }
        },
        messages: {
            name: { required: "Please enter curriculum name", minlength: "At least 2 characters required" },
            code: { maxlength: "Code must not exceed 10 characters" },
            country: { maxlength: "Country name must not exceed 100 characters" },
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
