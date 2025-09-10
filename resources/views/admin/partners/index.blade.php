@extends('admin.default')

@section('css')
    <style>
        .table td {
            white-space: unset;
        }

        .swal2-confirm.red-button {
            background-color: red !important;
            border-color: red !important;
            color: white !important;
        }
    </style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Partners</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Partners</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Partners</h3>
                    <a class="btn btn-primary" href="{{ route('admin.partners.create') }}">
                        <i class="fas fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $item)
                        <tr>
                            <td>
                                @if($item->thumbnail_img)
                                    <span class="avatar avatar-xxxl me-2">
                                        <img src="{{ asset('storage/'.$item->thumbnail_img) }}" alt="{{ $item->name }}">
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($item->logo)
                                    <span class="avatar me-2">
                                        <img src="{{ asset('storage/'.$item->logo) }}" alt="{{ $item->name }}">
                                    </span>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at->format('F d, Y') }}</td>
                            <td class="text-center">
                                <div class='btn-group'>
                                    <a href="{{ route('admin.partners.edit', $item->id) }}" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                    <form class="delete-partner-form" action="{{ route('admin.partners.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-sm">
                                            <i class="fas fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($partners->total() > 2)
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    {{ $partners->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(".delete-partner-form").on("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "<strong>Are you sure?</strong>",
                icon: "warning",
                html: `<p>Do you really want to delete this partner?</p>`,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `<i class="fa fa-trash"></i> Yes, delete it!`,
                confirmButtonAriaLabel: "Confirm deletion",
                cancelButtonText: `<i class="fa fa-times"></i> Cancel`,
                cancelButtonAriaLabel: "Cancel deletion",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: 'red-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection
