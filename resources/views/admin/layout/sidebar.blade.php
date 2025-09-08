<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center border bg-white rounded p-2 mb-3">
                        <span class="avatar avatar-xl me-2 avatar-rounded">
                            <img src="{{ asset('storage/' . (optional(auth()->guard('admin')->user()->profile)->img ?? 'profile/default.jpg')) }}" alt="img">
                        </span>
                        <span class="text-dark ms-2 fw-normal">Welcome <br> {{ auth()->guard('admin')->user()->name }}</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr"><span>Main</span></h6>
                    <ul>
                        <li class="@if(request()->path() == 'admin') active @endif">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>MENU</span></h6>
                    <ul>

                        <li class="@if(request()->path() == 'admin/cms') active @endif">
                            <a href="javascript:void(0);">
                                <i class="ti ti-page-break"></i>
                                <span>CMS</span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>