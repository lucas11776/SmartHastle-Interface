@inject('categories', App\Category)
<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="{{ url('') }}">
                <div class="d-flex flex-row align-items-center justify-content-start">
                    <div>
                        <img src="{{ url('assets/app/images/logo_1.png') }}"
                             alt="SmartHustle">
                    </div>
                    <div>
                        {{ env('APP_NAME') }}
                    </div>
                </div>
            </a>
        </div>
        <div class="hamburger">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                @auth()
                    @if(auth()->user()->isStaff())
                        <li>
                            <a href="{{ url('dashboard') }}">
                                <i class="fas fa-tachometer-alt"
                                   title="Dashboard"></i> Dashboard
                            </a>
                        </li>
                    @endif

                @endauth
                @foreach($categories::all() as $category)
                    <li>
                        <a href="{{ 'categories/' . $category->slug }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
                    @auth()
                        <li>
                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                <i class="fas fa-sign-out-alt"
                                   title="Logout"></i> Logout
                            </a>
                            <form id="logout-form"
                                  method="post"
                                  action="{{ url('logout') }}">
                                @csrf
                            </form>
                        </li>
                    @endauth
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->
            <div class="header_search">
                <form action="{{ url('search') }}"
                      method="GET"
                      id="header_search_form">
                    @csrf
                    <input type="text"
                           name="q"
                           class="search_input"
                           placeholder="Search Product..."
                           value="{{ request()->get('q') }}"
                           required="required">
                    <button class="header_search_button">
                        <img src="{{ url('assets/app/images/search.png') }}"
                             alt="Search">
                    </button>
                </form>
            </div>
            @auth()
                <div class="user">
                    <a href="{{ url('my/account') }}">
                        <div>
                            <img src="{{ url('assets/app/images/user.svg') }}"
                                 alt="https://www.flaticon.com/authors/freepik"
                                 title="My Account">
                        </div>
                    </a>
                </div>
                <div class="cart user">
                    <a href="{{ url('cart') }}"
                       title="My Cart">
                        <div>
                            <img class="svg"
                                 src="{{ url('assets/app/images/cart.svg') }}"
                                 alt="https://www.flaticon.com/authors/freepik">
                            <div>
                                {{ auth()->user()->cart()->count() }}
                            </div>
                        </div>
                    </a>
                </div>
            @endauth
            @guest()
                <div class="user mr-0 mr-sm-3">
                    <a href="{{ url('login') }}">
                        <div>
                            <img src="{{ url('assets/app/images/user.svg') }}"
                                 alt="https://www.flaticon.com/authors/freepik"
                                 title="Login">
                        </div>
                    </a>
                </div>
            @endguest
            <!-- Company phone number -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <div>
                    <div>
                        <a href="tel:+1 912-252-7350">
                            <img src="{{ url('assets/app/images/phone.svg') }}"
                                 alt="https://www.flaticon.com/authors/freepik"
                                 title="Call Us Now">
                        </a>
                    </div>
                </div>
                <div>
                    <a href="tel:{{ env('APP_CELLPHONE') }}">
                        {{ env('APP_CELLPHONE') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
