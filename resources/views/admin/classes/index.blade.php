@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Classes</h3>
    <a href="{{ route('admin.classes.create') }}" class="btn btn-primary">
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
                    <th>Course + Book</th>
                    <th>Tutor</th>
                    <th>Meeting Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>Grade 10 Math - Section A</td>
                    <td>Mathematics Grade 10 + Algebra Essentials</td>
                    <td>John Smith</td>
                    <td>In Person</td>
                    <td>2025-09-01</td>
                    <td>2026-03-15</td>
                    <td>Scheduled</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Grade 11 Physics - Online</td>
                    <td>Physics Grade 11 + Mechanics Basics</td>
                    <td>Jane Doe</td>
                    <td>Online</td>
                    <td>2025-09-05</td>
                    <td>2026-02-20</td>
                    <td>Running</td>
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
