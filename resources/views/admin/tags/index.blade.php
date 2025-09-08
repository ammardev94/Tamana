@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Tags</h3>
    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
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
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>STEM</td>
                    <td>Science, Technology, Engineering, Mathematics related content</td>
                    <td>2025-01-15</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Beginner</td>
                    <td>For entry-level learners</td>
                    <td>2025-02-02</td>
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
