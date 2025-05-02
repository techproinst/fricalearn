<nav>
    <div class="left-section">
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" />
        </div>

        <ul>
            <li><a class="{{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
            <li><a class="{{ request()->routeIs('courses.*') ? 'active' : '' }}"
                    href="{{ route('courses.index') }}">Courses</a></li>
            <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}"
                    href="{{ route('contact.show') }}">Contact</a></li>
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
                    @php
                        $parent = Auth::guard('parent')->user();
                    @endphp

                    @if ($parent->profile_photo)
                        <img width="30" height="30" class="rounded-circle border"
                            src="{{ asset('storage/uploads/' . $parent->profile_photo) }}" alt="user">
                    @else
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="User" />
                    @endif

                    <div>
                        <strong>Parent</strong>
                        <p class="text-muted m-0">{{ $parent->name }}</p>
                    </div>
                    <i class="bi bi-chevron-down ms-2"></i>
                </div>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('parent.dashboard') }}">Profile</a></li>
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
            <a class="sign-up me-2 {{ request()->routeIs('parent.registration.form') ? 'active' : '' }}"
                href="{{ route('parent.registration.form') }}">Sign Up</a>
            <a class="login  {{ request()->routeIs('parent.registration.form') ? '' : 'active' }}"
                href="{{ route('login') }}">Login</a>
        @endguest

        <li><a class="mobile-link active" href="{{ route('index') }}">Home</a></li>
        <li><a class="mobile-link" href="{{ route('courses.index') }}">Courses</a></li>
        <li><a class="mobile-link" href="{{ route('contact.show') }}">Contact</a></li>

        @guest('parent')
            <li><a class="mobile-link" href="{{ route('parent.registration.form') }}">Sign up</a></li>
            <li><a class="mobile-link" href="{{ route('login') }}">Login</a></li>
        @endguest


        @auth('parent')
            <li><a class="dropdown-item mobile-link" href="{{ route('parent.dashboard') }}">Profile</a></li>

            <form method="POST" action="{{ route('parent.logout') }}">
                @csrf
                <li><a class="dropdown-item mobile-link text-danger"><button class="mobile-submit-btn" type="submit">Logout</button></a></li>

            </form>
        @endauth

    </ul>
</nav>
