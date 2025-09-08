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
    <h3 class="page-title">Add Class</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.classes.index') }}">Classes</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Class Details</h3>
    </div>
    <form action="javascript:void(0);" method="POST" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Grade 10 Math - Section A" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="course_book_id" class="form-label">Course + Book</label>
                    <select name="course_book_id" id="course_book_id" class="form-control" required>
                        <option value="">-- Select Course + Book --</option>
                        {{-- Sample Data --}}
                        <option value="1">Mathematics Grade 10 + Algebra Essentials</option>
                        <option value="2">Physics Grade 11 + Mechanics Basics</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="tutor_id" class="form-label">Tutor</label>
                    <select name="tutor_id" id="tutor_id" class="form-control" required>
                        <option value="">-- Select Tutor --</option>
                        {{-- Sample Data --}}
                        <option value="1">John Smith</option>
                        <option value="2">Jane Doe</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="number" name="capacity" id="capacity" class="form-control" placeholder="e.g., 30">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="meeting_type" class="form-label">Meeting Type</label>
                    <select name="meeting_type" id="meeting_type" class="form-control">
                        <option value="">-- Select Meeting Type --</option>
                        <option value="in_person">In Person</option>
                        <option value="online">Online</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="location" class="form-label">Location / URL</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="Room 204 or Zoom link">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Select Status --</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="running">Running</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.classes.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            name: { required: true },
            course_book_id: { required: true },
            tutor_id: { required: true },
            start_date: { required: true },
            end_date: { required: true }
        },
        messages: {
            name: { required: "Please enter a class name" },
            course_book_id: { required: "Please select course + book" },
            tutor_id: { required: "Please select a tutor" },
            start_date: { required: "Please select start date" },
            end_date: { required: "Please select end date" }
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
