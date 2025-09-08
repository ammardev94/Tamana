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
    <h3 class="page-title">Enroll Student in Class</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.class_students.index') }}">Class Students</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Enrollment Details</h3>
    </div>
    <form action="javascript:void(0);" method="POST" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="class_id" class="form-label">Class</label>
                    <select name="class_id" id="class_id" class="form-control" required>
                        <option value="">-- Select Class --</option>
                        {{-- Sample Data --}}
                        <option value="1">Grade 10 Math - Section A</option>
                        <option value="2">Grade 11 Physics - Online</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="student_id" class="form-label">Student</label>
                    <select name="student_id" id="student_id" class="form-control" required>
                        <option value="">-- Select Student --</option>
                        {{-- Sample Data --}}
                        <option value="1">Alice Johnson</option>
                        <option value="2">Bob Williams</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="enrollment_date" class="form-label">Enrollment Date</label>
                    <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Select Status --</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="dropped">Dropped</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.class_students.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            class_id: { required: true },
            student_id: { required: true },
            enrollment_date: { required: true }
        },
        messages: {
            class_id: { required: "Please select a class" },
            student_id: { required: "Please select a student" },
            enrollment_date: { required: "Please select the enrollment date" }
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
