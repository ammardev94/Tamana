    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand font-weight-bold" href="#">LMS</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>

                <!-- Role Select (Top Right) -->
                <form class="form-inline my-2 my-lg-0">
                    <select class="form-control" id="roleSelect" onchange="handleRoleChange(this.value)">
                        <option value="">Login as...</option>
                        <option value="admin">Admin</option>
                        <option value="tutor">Tutor</option>
                        <option value="parent">Parent</option>
                        <option value="student">Student</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>