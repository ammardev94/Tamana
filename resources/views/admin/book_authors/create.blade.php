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
        <h3 class="page-title mb-1">Add Book Author</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.book_authors.index') }}">Book Authors</a></li>
                <li class="breadcrumb-item active">Add Book Author</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Book Author</h3>
            </div>
            <form action="javascript:void(0);" method="POST" id="form">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="book_id">Book</label>
                            <select name="book_id" id="book_id" class="form-control" required>
                                <option value="">-- Select Book --</option>
                                <option value="1">The Great Adventure</option>
                                <option value="2">Mystery of the Night</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="author_id">Author</label>
                            <select name="author_id" id="author_id" class="form-control" required>
                                <option value="">-- Select Author --</option>
                                <option value="1">Jane Doe</option>
                                <option value="2">John Smith</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="form-label" for="role">Role</label>
                            <input type="text" class="form-control" name="role" id="role" placeholder="e.g., Primary Author, Co-Author, Editor" value="{{ old('role') }}">
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <a href="{{ route('admin.book_authors.index') }}" class="btn btn-light me-2"><i class="fas fa-times-circle"></i> Cancel</a>
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
            book_id: { required: true },
            author_id: { required: true }
        },
        messages: {
            book_id: { required: "Please select a book" },
            author_id: { required: "Please select an author" }
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
