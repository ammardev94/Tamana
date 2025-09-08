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
    <h3 class="page-title">Add New Course</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}">Courses</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Course Details</h3>
    </div>
    <form action="javascript:void(0);" method="POST" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Mathematics Grade 10" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="code" class="form-label">Course Code</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="e.g., MATH-10">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Short summary of the course"></textarea>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="subject_id" class="form-label">Subject</label>
                    <select name="subject_id" id="subject_id" class="form-control" required>
                        <option value="">-- Select Subject --</option>
                        {{-- Sample Data --}}
                        <option value="1">Mathematics</option>
                        <option value="2">Physics</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="curriculum_id" class="form-label">Curriculum</label>
                    <select name="curriculum_id" id="curriculum_id" class="form-control" required>
                        <option value="">-- Select Curriculum --</option>
                        {{-- Sample Data --}}
                        <option value="1">CBSE</option>
                        <option value="2">IB</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="grade_level" class="form-label">Grade Level</label>
                    <input type="text" name="grade_level" id="grade_level" class="form-control" placeholder="e.g., Grade 10" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="academic_term" class="form-label">Academic Term</label>
                    <input type="text" name="academic_term" id="academic_term" class="form-control" placeholder="e.g., Term 1, Semester 2">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="credits" class="form-label">Credits</label>
                    <input type="number" step="0.5" name="credits" id="credits" class="form-control" placeholder="e.g., 3">
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Select Status --</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
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
            subject_id: { required: true },
            curriculum_id: { required: true },
            grade_level: { required: true }
        },
        messages: {
            name: { required: "Please enter the course name" },
            subject_id: { required: "Please select a subject" },
            curriculum_id: { required: "Please select a curriculum" },
            grade_level: { required: "Please enter the grade level" }
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
