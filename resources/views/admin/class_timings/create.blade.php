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
    <h3 class="page-title">Add Class Timing</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.class_timings.index') }}">Class Timings</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Timing Details</h3>
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
                    <label class="form-label">Days of Week</label><br>
                    {{-- Multiple checkbox selection --}}
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="monday"> Monday
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="tuesday"> Tuesday
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="wednesday"> Wednesday
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="thursday"> Thursday
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="friday"> Friday
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="saturday"> Saturday
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="days_of_week[]" value="sunday"> Sunday
                    </div>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="time" name="start_time" id="start_time" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="time" name="end_time" id="end_time" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="timezone" class="form-label">Timezone</label>
                    <select name="timezone" id="timezone" class="form-control" required>
                        <option value="">-- Select Timezone --</option>
                        {{-- Sample Data --}}
                        <option value="Asia/Karachi">Asia/Karachi</option>
                        <option value="America/New_York">America/New_York</option>
                        <option value="Europe/London">Europe/London</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.class_timings.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
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
            "days_of_week[]": { required: true },
            start_time: { required: true },
            end_time: { required: true },
            timezone: { required: true }
        },
        messages: {
            class_id: { required: "Please select a class" },
            "days_of_week[]": { required: "Please select at least one day" },
            start_time: { required: "Please select a start time" },
            end_time: { required: "Please select an end time" },
            timezone: { required: "Please select a timezone" }
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
