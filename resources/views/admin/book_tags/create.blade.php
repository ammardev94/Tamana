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
    <h3 class="page-title">Assign Tag to Book</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.book_tags.index') }}">Book Tags</a></li>
            <li class="breadcrumb-item active">Assign Tag</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Assign Tag</h3>
    </div>
    <form action="javascript:void(0);" method="POST" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="book_id" class="form-label">Book</label>
                    <select class="form-control" name="book_id" id="book_id" required>
                        <option value="">-- Select Book --</option>
                        {{-- Sample Options --}}
                        <option value="1">Mathematics for Beginners</option>
                        <option value="2">Physics Fundamentals</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="tag_id" class="form-label">Tag</label>
                    <select class="form-control" name="tag_id" id="tag_id" required>
                        <option value="">-- Select Tag --</option>
                        {{-- Sample Options --}}
                        <option value="1">Beginner</option>
                        <option value="2">STEM</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.book_tags.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            book_id: { required: true },
            tag_id: { required: true }
        },
        messages: {
            book_id: { required: "Please select a book" },
            tag_id: { required: "Please select a tag" }
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
