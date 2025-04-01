<nav>
    <div class="left-section">
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" />
        </div>

        <ul>
            <li><a href="">Home</a></li>
            <li><a class="active" href="courses.html">Courses</a></li>
            <li><a href="contact-us.html">Contact</a></li>
        </ul>
    </div>

    <input type="checkbox" id="click" />
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
    <ul>
        @auth
        <div class="dropdown">
            <div class="user-dropdown d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/images/avatar.png') }}" alt="User" />
                <div>
                    <strong>John Doe</strong>
                    <p class="text-muted m-0">Parent</p>
                </div>
                <i class="bi bi-chevron-down ms-2"></i>
            </div>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
            </ul>

        </div>
        @endauth

        @guest
        <a class="sign-up me-2 {{ request()->routeIs('parent.registration.form') ? 'active' : ''}}"
            href="{{ route('parent.registration.form') }}">Sign Up</a>
        <a class="login  {{ request()->routeIs('parent.registration.form') ? '' : 'active'}}" href="login.html">Login</a>

        @endguest

        <li><a class="mobile-link active" href="#">Home</a></li>
        <li><a class="mobile-link" href="#">Courses</a></li>
        <li><a class="mobile-link" href="#">Contact</a></li>

        @auth
        <li><a class="dropdown-item mobile-link" href="#">Profile</a></li>
        <li><a class="dropdown-item mobile-link" href="#">Settings</a></li>
        <li><a class="dropdown-item mobile-link text-danger" href="#">Logout</a></li>

        @endauth

    </ul>
</nav>