@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Class Enrollments</h3>
    <a href="{{ route('admin.class_students.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
    </a>
</div>

@include('include.messages')

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Student</th>
                    <th>Enrollment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>Grade 10 Math - Section A</td>
                    <td>Alice Johnson</td>
                    <td>2025-09-01</td>
                    <td>Active</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Grade 11 Physics - Online</td>
                    <td>Bob Williams</td>
                    <td>2025-09-05</td>
                    <td>Completed</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
