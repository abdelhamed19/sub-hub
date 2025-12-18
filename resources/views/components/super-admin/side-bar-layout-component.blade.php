<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>{{ __('super_admin.sidebar') }}</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#superAdminsMenu" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">{{ __('super_admin.super_admin') }}</span><span
                        class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="superAdminsMenu">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('super_admin.manage') }}"><span
                                class="ml-1 item-text">{{ __('super_admin.manage') }}</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#clientsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user-plus fe-16"></i>
                    <span class="ml-3 item-text">{{ __('super_admin.clients') }}</span><span
                        class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="clientsMenu">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('super_admin.client.manage') }}"><span
                                class="ml-1 item-text">{{ __('super_admin.manage_clients') }}</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link pl-3" href=""><span
                                class="ml-1 item-text">{{ __('super_admin.manage_clients_assistants') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
