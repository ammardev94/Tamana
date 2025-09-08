@extends('admin.default')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="page-title">Class Timings</h3>
    <a href="{{ route('admin.class_timings.create') }}" class="btn btn-primary">
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
                    <th>Days of Week</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Timezone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sample Data --}}
                <tr>
                    <td>1</td>
                    <td>Grade 10 Math - Section A</td>
                    <td>Monday, Wednesday, Friday</td>
                    <td>09:00</td>
                    <td>10:30</td>
                    <td>Asia/Karachi</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Grade 11 Physics - Online</td>
                    <td>Tuesday, Thursday</td>
                    <td>14:00</td>
                    <td>15:30</td>
                    <td>Asia/Karachi</td>
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
