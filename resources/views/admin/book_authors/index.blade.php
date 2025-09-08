@extends('admin.default')

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Book Authors</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <a href="{{ route('admin.book_authors.create') }}" class="btn btn-primary">
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
                    <th>Book</th>
                    <th>Author</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample data row --}}
                <tr>
                    <td>1</td>
                    <td>The Great Adventure</td>
                    <td>Jane Doe</td>
                    <td>Primary Author</td>
                    <td>2025-08-01</td>
                    <td>2025-08-05</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                {{-- End sample row --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
