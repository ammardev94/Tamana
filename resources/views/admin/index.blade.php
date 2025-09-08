@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Admin Dashboard</h3>

    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">

    <!-- Total Students -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <div class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
                        <img src="{{ asset('assets/img/icons/student.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">3654</h2>
                            <span class="badge bg-danger">1.2%</span>
                        </div>
                        <p>Total Students</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                    <p class="mb-0">Active : <span class="text-dark fw-semibold">3643</span></p>
                    <span class="text-light">|</span>
                    <p>Inactive : <span class="text-dark fw-semibold">11</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Total Students -->

    <!-- Total Teachers -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <div class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-secondary-transparent p-1">
                        <img src="{{ asset('assets/img/icons/teacher.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">284</h2>
                            <span class="badge bg-skyblue">1.2%</span>
                        </div>
                        <p>Total Teachers</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                    <p class="mb-0">Active : <span class="text-dark fw-semibold">254</span></p>
                    <span class="text-light">|</span>
                    <p>Inactive : <span class="text-dark fw-semibold">30</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Total Teachers -->

    <!-- Total Staff -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <div class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-warning-transparent p-1">
                        <img src="{{ asset('assets/img/icons/staff.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">162</h2>
                            <span class="badge bg-warning">1.2%</span>
                        </div>
                        <p>Total Staff</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                    <p class="mb-0">Active : <span class="text-dark fw-semibold">161</span></p>
                    <span class="text-light">|</span>
                    <p>Inactive : <span class="text-dark fw-semibold">02</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Total Staff -->

    <!-- Total Subjects -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <div class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-success-transparent p-1">
                        <img src="{{ asset('assets/img/icons/subject.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">82</h2>
                            <span class="badge bg-success">1.2%</span>
                        </div>
                        <p>Total Subjects</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                    <p class="mb-0">Active : <span class="text-dark fw-semibold">81</span></p>
                    <span class="text-light">|</span>
                    <p>Inactive : <span class="text-dark fw-semibold">01</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Total Subjects -->

</div>
@endsection