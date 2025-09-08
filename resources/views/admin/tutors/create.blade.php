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
    <h3 class="page-title">Add Tutor</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tutors.index') }}">Tutors</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tutor Details</h3>
    </div>
    <form action="javascript:void(0);" method="POST" id="form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">-- Select User --</option>
                        {{-- Sample Data --}}
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                    </select>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="experience" class="form-label">Experience</label>
                    <input type="text" name="experience" id="experience" class="form-control" placeholder="e.g., 5 years teaching Math" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="specialization" class="form-label">Specialization</label>
                    <input type="text" name="specialization" id="specialization" class="form-control" placeholder="e.g., Mathematics" required>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="qualifications" class="form-label">Qualifications</label>
                    <input type="text" name="qualifications" id="qualifications" class="form-control" placeholder="e.g., M.Sc. in Mathematics" required>
                </div>

                <div class="col-md-12 form-group mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" rows="3" placeholder="Short biography" required></textarea>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('admin.tutors.index') }}" class="btn btn-light"><i class="fas fa-times-circle"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            user_id: { required: true },
            bio: { required: true, minlength: 10 },
            experience: { required: true },
            specialization: { required: true },
            qualifications: { required: true }
        },
        messages: {
            user_id: { required: "Please select a user" },
            bio: { required: "Please enter a bio", minlength: "Bio must be at least 10 characters long" },
            experience: { required: "Please enter experience" },
            specialization: { required: "Please enter specialization" },
            qualifications: { required: "Please enter qualifications" }
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
