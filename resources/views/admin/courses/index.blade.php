@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Courses</h3>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
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
                    <th>Name</th>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Curriculum</th>
                    <th>Grade Level</th>
                    <th>Academic Term</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>Mathematics Grade 10</td>
                    <td>MATH-10</td>
                    <td>Mathematics</td>
                    <td>CBSE</td>
                    <td>Grade 10</td>
                    <td>Term 1</td>
                    <td>Active</td>
                    <td>2025-02-01</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Physics Grade 11</td>
                    <td>PHY-11</td>
                    <td>Physics</td>
                    <td>IB</td>
                    <td>Grade 11</td>
                    <td>Semester 2</td>
                    <td>Inactive</td>
                    <td>2025-02-05</td>
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
