<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('assets/images/logo.png') }}" alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ Auth::guard('web')->user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-book-open"></i>
                        <span>Courses Menu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('demo_course.index') }}">Demo Courses</a></li>
                        <li><a href="{{ route('courses.show') }}">Courses</a></li>
                        <li><a href="{{ route('course_materials.show') }}">Upload Course Material</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Schedules Menu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('class_schedule.index') }}">Class Schedules</a></li>
                       

                    </ul>
                </li>


                <li>
                    <a href="{{ route('payments.show') }}" class="waves-effect">
                        <i class=" fas fa-money-check-alt"></i>
                        <span>Payments Menu</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('subscriptions.show') }}" class="waves-effect">
                        <i class=" fas fa-sync-alt"></i>
                        <span>Subscriptions Menu</span>
                    </a>

                </li>


              {{--  

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-preloader.html">Preloader</a></li>
                                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                            </ul>
                        </li>
                </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-offcanvas.html">Offcavas</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-general.html">General</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>Advanced UI</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="advance-rangeslider.html">Range Slider</a></li>
                        <li><a href="advance-roundslider.html">Round Slider</a></li>
                        <li><a href="advance-session-timeout.html">Session Timeout</a></li>
                        <li><a href="advance-sweet-alert.html">Sweetalert 2</a></li>
                        <li><a href="advance-rating.html">Rating</a></li>
                        <li><a href="advance-notifications.html">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span class="badge rounded-pill bg-danger float-end">8</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Form Advanced Plugins</a></li>
                        <li><a href="form-editors.html">Form Editors</a></li>
                        <li><a href="form-uploads.html">Form File Upload</a></li>
                        <li><a href="form-xeditable.html">Form X-editable</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Tables</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html">Apex Charts</a></li>
                        <li><a href="charts-chartjs.html">Chartjs Charts</a></li>
                        <li><a href="charts-flot.html">Flot Charts</a></li>
                        <li><a href="charts-knob.html">Jquery Knob Charts</a></li>
                        <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-remix.html">Remix Icons</a></li>
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
