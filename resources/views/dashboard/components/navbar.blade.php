<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
          action="{{ url('dashboard/search') }}"
          method="GET">
        @csrf
        <div class="input-group">
            <input type="text"
                   name="q"
                   class="form-control bg-light border-0 small"
                   placeholder="Search for user account."
                   aria-label="Search"
                   aria-describedby="dashboard-search"
                   value="{{ request()->get('q') }}">
            <div class="input-group-append">
                <button class="btn btn-primary"
                        type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle"
               href="#"
               id="searchDropdown"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search"
                      action="{{ url('dashboard/search') }}"
                      method="GET">
                    <div class="input-group">
                        <input type="text"
                               name="q"
                               class="form-control bg-light border-0 small"
                               placeholder="Search for user account..."
                               aria-label="Search"
                               aria-describedby="dashboard-search">
                        <div class="input-group-append">
                            <button class="btn btn-primary"
                                    type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Home Link -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle"
               href="{{ url('') }}">
                <i class="fas fa-home"></i>
                <span class="pl-1 d-none d-md-block">Home</span>
            </a>
        </li>
        <!-- Dashboard Link -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle"
               href="{{ url('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span class="pl-1 d-none d-md-block">Dashboard</span>
            </a>
        </li>
        @include('components.dashboard.notification.new-orders')
        <!-- Block -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - user Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle"
               href="#" id="userDropdown"
               role="button"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{  auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                </span>
                <img class="img-profile rounded-circle"
                     src="{{ auth()->user()->image->url }}"
                     title="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name  }}">
            </a>
            <!-- Dropdown - user Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                @auth
                    <a class="dropdown-item"
                       href="{{ url('my/account') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    @if(auth()->user()->isStaff())
                        <a class="dropdown-item"
                           href="{{ url('dashboard/orders')  }}">
                            <i class="fas fa-users text-info fa-sm fa-fw mr-2"></i>
                            Orders
                        </a>
                        <div class="dropdown-divider"></div>
                    @endif
                    @if(auth()->user()->isAdministrator())
                        <a class="dropdown-item"
                           href="{{ url('dashboard/products')  }}">
                            <i class="fas fa-store fa-sm fa-fw mr-2 text-gray-400"></i>
                            Products
                        </a>
                        <a class="dropdown-item"
                           href="{{ url('dashboard/categories') }}">
                            <i class="fas fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Categories
                        </a>
                        <a class="dropdown-item"
                           href="{{ url('dashboard/users') }}">
                            <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                            Accounts
                        </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                       href="#"
                       data-toggle="modal"
                       data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                @endauth
            </div>
        </li>
    </ul>
</nav>
