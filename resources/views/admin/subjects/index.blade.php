@extends('admin.default')

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Subjects</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample data --}}
                <tr>
                    <td>1</td>
                    <td>Mathematics</td>
                    <td>MATH101</td>
                    <td>Study of numbers, quantities, and shapes.</td>
                    <td>Active</td>
                    <td>2025-08-01</td>
                    <td>2025-08-05</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                {{-- End sample data --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
