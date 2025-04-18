<nav>
    <div class="left-section">
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" />
        </div>

        <ul>
            <li><a class="{{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
            <li><a class="{{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Courses</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </div>

    <input type="checkbox" id="click" />
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
    <ul>
        
        @auth('parent')
        <div class="dropdown">
            <div class="user-dropdown d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/images/avatar.png') }}" alt="User" />
                <div>
                    <strong>Parent</strong>
                    <p class="text-muted m-0">{{ Auth::guard('parent')->user()->name }}</p>
                </div>  
                <i class="bi bi-chevron-down ms-2"></i>
            </div>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('parent.dashboard') }}">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <form method="POST" action="{{ route('parent.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout
                        </button>


                    </form>
                </li>
            </ul>
        </div>
        @endauth


        @guest('parent')
        <a class="sign-up me-2 {{ request()->routeIs('parent.registration.form') ? 'active' : ''}}"
            href="{{ route('parent.registration.form') }}">Sign Up</a>
        <a class="login  {{ request()->routeIs('parent.registration.form') ? '' : 'active'}}"
            href="{{ route('login') }}">Login</a>

        @endguest

        <li><a class="mobile-link active" href="#">Home</a></li>
        <li><a class="mobile-link" href="#">Courses</a></li>
        <li><a class="mobile-link" href="#">Contact</a></li>

        @auth('parent')
        <li><a class="dropdown-item mobile-link" href="#">Profile</a></li>
        <li><a class="dropdown-item mobile-link" href="#">Settings</a></li>
        <li><a class="dropdown-item mobile-link text-danger" href="#">Logout</a></li>

        @endauth

    </ul>
</nav>