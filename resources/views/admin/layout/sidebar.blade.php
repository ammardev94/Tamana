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

                        <li class="@if(request()->path() == 'admin/users') active @endif">
                            <a href="{{ route('admin.user.index') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Users</span>
                            </a>
                        </li>

                        <li class="@if(request()->path() == 'admin/authors') active @endif">
                            <a href="{{ route('admin.author.index') }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-writing"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" /><path d="M16 7h4" /><path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3" /></svg>
                                <span>Authors</span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="javascript:void(0);" class="
                            @if(
                                Str::contains(request()->path(), '/books') || 
                                Str::contains(request()->path(), '/book_authors') || 
                                Str::contains(request()->path(), '/tags') || 
                                Str::contains(request()->path(), '/book_tags')
                            ) subdrop active 
                            @endif">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-books"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M5 8h4" /><path d="M9 16h4" /><path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" /><path d="M14 9l4 -1" /><path d="M16 16l3.923 -.98" /></svg>
                                <span>Books Management</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="@if(request()->path() == 'admin/books') active @endif">
                                    <a href="{{ route('admin.book.index') }}" class="@if(request()->path() == 'admin/books') active @endif">
                                        <i class="ti ti-book-2" aria-hidden="true"></i>
                                        <span>Books</span>
                                    </a>
                                </li>
                                <li class="@if(request()->path() == 'admin/book_authors') active @endif">
                                    <a href="{{ route('admin.book_authors.index') }}" class="@if(request()->path() == 'admin/book_authors') active @endif">
                                        <i class="ti ti-book-2"></i>
                                        <span>Book Author</span>
                                    </a>
                                </li>
                                <li class="@if(request()->path() == 'admin/tags') active @endif">
                                    <a href="{{ route('admin.tags.index') }}" class="@if(request()->path() == 'admin/tags') active @endif">
                                        <i class="ti ti-book-2"></i>
                                        <span>Tags</span>
                                    </a>
                                </li>
                                <li class="@if(request()->path() == 'admin/book_tags') active @endif">
                                    <a href="{{ route('admin.book_tags.index') }}" class="@if(request()->path() == 'admin/book_tags') active @endif">
                                        <i class="ti ti-book-2"></i>
                                        <span>Book Tags</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 

                        <li class="@if(request()->path() == 'admin/subjects') active @endif">
                            <a href="{{ route('admin.subjects.index') }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-library"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" /><path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" /><path d="M11 7h5" /><path d="M11 10h6" /><path d="M11 13h3" /></svg>
                                <span>Subject</span>
                            </a>
                        </li>

                        <li class="@if(request()->path() == 'admin/curriculum') active @endif">
                            <a href="{{ route('admin.curriculum.index') }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6l0 13" /><path d="M12 6l0 13" /><path d="M21 6l0 13" /></svg>
                                <span>Curriculum</span>
                            </a>
                        </li>


                        <li class="submenu">
                            <a href="javascript:void(0);" class="
                            @if(
                                Str::contains(request()->path(), '/courses') || 
                                Str::contains(request()->path(), '/course_books')
                            ) subdrop active 
                            @endif">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-certificate"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" /><path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" /><path d="M6 9l12 0" /><path d="M6 12l3 0" /><path d="M6 15l2 0" /></svg>
                                <span>Course Management</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="@if(request()->path() == 'admin/courses') active @endif">
                                    <a href="{{ route('admin.courses.index') }}" class="@if(request()->path() == 'admin/courses') active @endif">
                                        <i class="ti ti-book-2" aria-hidden="true"></i>
                                        <span>Courses</span>
                                    </a>
                                </li>
                                <li class="@if(request()->path() == 'admin/course_books') active @endif">
                                    <a href="{{ route('admin.course_books.index') }}" class="@if(request()->path() == 'admin/course_books') active @endif">
                                        <i class="ti ti-book-2"></i>
                                        <span>Course Books</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 

                        <li class="@if(request()->path() == 'admin/tutors') active @endif">
                            <a href="{{ route('admin.tutors.index') }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" /><path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" /><path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" /></svg>
                                <span>Tutors</span>
                            </a>
                        </li>

                        <li class="@if(request()->path() == 'admin/students') active @endif">
                            <a href="{{ route('admin.students.index') }}">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                                <span>Students</span>
                            </a>
                        </li>


                        <li class="submenu">
                            <a href="javascript:void(0);" class="
                            @if(
                                Str::contains(request()->path(), '/classes') || 
                                Str::contains(request()->path(), '/class_students') || 
                                Str::contains(request()->path(), '/class_timings')
                            ) subdrop active 
                            @endif">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" /><path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" /><path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" /></svg>
                                <span>Class Management</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li class="@if(request()->path() == 'admin/classes') active @endif">
                                    <a href="{{ route('admin.classes.index') }}" class="@if(request()->path() == 'admin/classes') active @endif">
                                        <i class="ti ti-book-2" aria-hidden="true"></i>
                                        <span>Classes</span>
                                    </a>
                                </li>
                                <li class="@if(request()->path() == 'admin/class_students') active @endif">
                                    <a href="{{ route('admin.class_students.index') }}" class="@if(request()->path() == 'admin/class_students') active @endif">
                                        <i class="ti ti-book-2"></i>
                                        <span>Class Enrollments</span>
                                    </a>
                                </li>
                                <li class="@if(request()->path() == 'admin/class_timings') active @endif">
                                    <a href="{{ route('admin.class_timings.index') }}" class="@if(request()->path() == 'admin/class_timings') active @endif">
                                        <i class="ti ti-book-2"></i>
                                        <span>Class Timings</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 


                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>