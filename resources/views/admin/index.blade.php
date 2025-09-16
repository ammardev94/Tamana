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
        <a href="{{ route('admin.news.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
                        <img src="{{ asset('assets/img/icons/company-icon-04.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $news }}</h2>
                        </div>
                        <p>Total News</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Students -->

    <!-- Total Teachers -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <a href="{{ route('admin.portfolio.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-secondary-transparent p-1">
                        <img src="{{ asset('assets/img/icons/company-icon-04.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $portfolios }}</h2>
                        </div>
                        <p>Total Portfolio</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Teachers -->

    <!-- Total Staff -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <a href="{{ route('admin.teams.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-warning-transparent p-1">
                        <img src="{{ asset('assets/img/icons/company-icon-04.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $teams }}</h2>
                        </div>
                        <p>Total Teams</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Staff -->

    <!-- Total Subjects -->
    <div class="col-xxl-3 col-sm-6 d-flex">
        <a href="{{ route('admin.services.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-success-transparent p-1">
                        <img src="{{ asset('assets/img/icons/company-icon-04.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $services }}</h2>
                        </div>
                        <p>Total Services</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Subjects -->

</div>

@endsection