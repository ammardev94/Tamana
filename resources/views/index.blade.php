@extends('default')


@section('content')

    <!-- Hero Section -->
    <section class="jumbotron text-center bg-primary text-white mb-0">
        <div class="container">
            <h1 class="display-4">Empower Learning with LMS</h1>
            <p class="lead">A complete Learning Management System for students, teachers, parents, and administrators.</p>
            <a href="#" class="btn btn-light btn-lg mt-3">Explore Courses</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="row">
                <div class="col-md-3 text-center">
                    <h5>Online Classes</h5>
                    <p>Interactive and live classes with video and screen sharing.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h5>Assignments</h5>
                    <p>Create, submit, and grade assignments with ease.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h5>Parent Portal</h5>
                    <p>Stay updated with your child’s performance and progress.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h5>Admin Dashboard</h5>
                    <p>Manage users, courses, and settings all in one place.</p>
                </div>
            </div>
        </div>
    </section>



@endsection


@section('js')

    <script>
        function handleRoleChange(role) {
            if (!role) return;
            switch(role) {
                case 'admin':
                    window.location.href = "{{ route('admin.login') }}"
                    break;
                case 'tutor':
                    window.location.href = "{{ route('tutor.login') }}"
                    break;
                case 'parent':
                    window.location.href = "{{ route('parent.login') }}"
                    break;
                case 'student':
                    window.location.href = "{{ route('student.login') }}"
                    break;
            }
        }
    </script>

@endsection