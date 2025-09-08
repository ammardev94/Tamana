@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Course Books</h3>
    <a href="{{ route('admin.course_books.create') }}" class="btn btn-primary">
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
                    <th>Course</th>
                    <th>Book</th>
                    <th>Assigned On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>Mathematics Grade 10</td>
                    <td>Algebra Essentials</td>
                    <td>2025-02-05</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Physics Grade 11</td>
                    <td>Fundamentals of Physics</td>
                    <td>2025-02-06</td>
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
