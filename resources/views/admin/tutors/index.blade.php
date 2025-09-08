@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Tutors</h3>
    <a href="{{ route('admin.tutors.create') }}" class="btn btn-primary">
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
                    <th>User</th>
                    <th>Bio</th>
                    <th>Experience</th>
                    <th>Specialization</th>
                    <th>Qualifications</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Passionate Math teacher.</td>
                    <td>5 years teaching Math</td>
                    <td>Mathematics</td>
                    <td>M.Sc. in Mathematics</td>
                    <td>2025-02-01</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>Expert in Physics and Astronomy.</td>
                    <td>8 years teaching Physics</td>
                    <td>Physics</td>
                    <td>Ph.D. in Physics</td>
                    <td>2025-02-05</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
