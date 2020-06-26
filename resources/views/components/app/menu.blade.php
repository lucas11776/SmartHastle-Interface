<div class="menu">
    <!-- Search -->
    <div class="menu_search">
        <form action="{{ url('search') }}"
              method="GET"
              id="menu_search_form"
              class="menu_search_form">
            @csrf
            <input type="text"
                   name="q"
                   class="search_input"
                   placeholder="Search for a product..."
                   value="{{ request()->get('q') }}"
                   required="required">
            <button class="menu_search_button">
                <img src="{{ url('assets/app/images/search.png') }}"
                     alt="Search">
            </button>
        </form>
    </div>
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            <li>
                <a href="{{ url('')  }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            @guest()
                <li>
                    <a href="{{ url('login') }}">
                        <i class="fas fa-door-open"></i> Login
                    </a>
                </li>
                <li>
                    <a href="{{ url('register')  }}">
                        <i class="fas fa-pen-fancy"></i> Register
                    </a>
                </li>
            @endguest
            @auth()
                <li>
                    <a href="{{ url('cart') }}">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>
                <li>
                    <a href="{{ url('my/favorites') }}">
                        <i class="fas fa-heart"></i> Favorites
                    </a>
                </li>
                <li>
                    <a href="{{ url('my/orders') }}">
                        <i class="fas fa-ticket-alt"></i> Orders
                    </a>
                </li>
                @if(auth()->user()->isStaff())
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <i class="fas fa-store"></i> Dashboard
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ url('logout')  }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-door-closed"></i> Logout
                    </a>
                </li>
                <form id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      style="display: none;">
                    @csrf
                </form>
            @endauth
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div>
                <div>
                    <img src="{{ url('assets/app/images/phone.svg') }}"
                         alt="https://www.flaticon.com/authors/freepik">
                </div>
            </div>
            <div>+1 912-252-7350</div>
        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
