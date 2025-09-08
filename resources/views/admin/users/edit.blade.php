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
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Edit Graduation Program</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.graduation.program.index') }}">Graduation Programs</a></li>
                <li class="breadcrumb-item active">Edit Graduation Program</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <form action="{{ route('admin.graduation.program.update', $graduationProgram->id) }}" method="POST" id="editGraduationProgram">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Graduation Program</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label for="program_level_id">Program Level</label>
                            <select class="form-control" name="program_level_id" id="program_level_id" required>
                                <option value="">Select Program Level</option>
                                @foreach($programLevels as $level)
                                    <option value="{{ $level->id }}" {{ $graduationProgram->program_level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="program_id">Department</label>
                            <select class="form-control" name="program_id" id="program_id" required>
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}" {{ $graduationProgram->program->parent->id == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-md-6 form-group mb-3">
                            <label for="sub_program_id">Program</label>
                            <select class="form-control" name="sub_program_id" id="sub_program_id" required>
                                <option value="">Select Program</option>
    
                            </select>
                        </div>
    
                        <div class="col-md-6 form-group mb-3">
                            <label for="name">Graduation Program Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $graduationProgram->name }}" required>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="in_take">In-Take</label>
                            <select class="form-select" name="in_take" id="in_take" required>
                                <option value="">Select In-Take</option>
                                <option value="fall" @selected($graduationProgram->in_take == "fall")>Fall</option>
                                <option value="spring" @selected($graduationProgram->in_take == "spring")>Spring</option>
                                <option value="summer" @selected($graduationProgram->in_take == "summer")>Summer</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <a href="{{ route('admin.graduation.program.index') }}" class="btn btn-light me-2"><i class="fas fa-times-circle"></i> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $("#editGraduationProgram").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                program_id: {
                    required: true
                },
                sub_program_id: {
                    required: true
                },
                program_level_id: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter a program name",
                    minlength: "Program name must be at least 2 characters long"
                },
                program_id: {
                    required: "Please select a program"
                },
                sub_program_id: {
                    required: "Please select a sub program"
                },
                program_level_id: {
                    required: "Please select a program level"
                }
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

        $('#program_id').change(function() {
            var program_id = $(this).val();
            if (program_id) {
                $.ajax({
                    url: '{{ route("admin.graduation.sub-program.index", ["program_id" => ":program_id"]) }}'.replace(':program_id', program_id),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var subProgramSelect = $('#sub_program_id');
                        subProgramSelect.empty();
                        subProgramSelect.append('<option value="">Select Program</option>');
                        $.each(data, function(index, program) {
                            subProgramSelect.append('<option value="' + program.id + '">' + program.name + '</option>');
                        });
                    }
                });
            } else {
                $('#sub_program_id').empty().append('<option value="">Select Program</option>');
            }
        });

        let mainProgramId = "{{ $graduationProgram->program->parent->id }}";
        if (mainProgramId) {

            let programId = "{{ $graduationProgram->program_id }}";

            $.ajax({
                url: '{{ route("admin.graduation.sub-program.index", ["program_id" => ":program_id"]) }}'.replace(':program_id', mainProgramId),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var subProgramSelect = $('#sub_program_id');
                    subProgramSelect.empty();
                    subProgramSelect.append('<option value="">Select Program</option>');
                    $.each(data, function(index, program) {
                        if (programId == program.id) {
                            subProgramSelect.append('<option value="' + program.id + '" selected>' + program.name + '</option>');
                        } else {
                            subProgramSelect.append('<option value="' + program.id + '">' + program.name + '</option>');
                        }
                    });
                }
            });
        }


    });
</script>
@endsection
