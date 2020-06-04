@inject('categories', App\Category)
<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="{{ url('') }}">
                <div class="d-flex flex-row align-items-center justify-content-start">
                    <div>
                        <img src="{{ url('assets/app/images/logo_1.png') }}"
                             alt="SmartHassle">
                    </div>
                    <div>SmartHassle</div>
                </div>
            </a>
        </div>
        <div class="hamburger">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                @auth()
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <i class="fas fa-store"></i> Dashboard
                        </a>
                    </li>
                @endauth

                @foreach($categories::all() as $category)
                    <li>
                        <a href="{{ 'categories/' . $category->slug }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->
            <div class="header_search">
                <form action="#"
                      id="header_search_form">
                    <input type="text"
                           class="search_input"
                           placeholder="Search Item"
                           required="required">
                    <button class="header_search_button">
                        <img src="assets/app/images/search.png"
                             alt="">
                    </button>
                </form>
            </div>
            @auth()
                <div class="user">
                    <a href="{{ url('my/account') }}">
                        <div>
                            <img src="{{ url('assets/app/images/user.svg') }}"
                                 alt="https://www.flaticon.com/authors/freepik"
                                 title="User account">
                        </div>
                    </a>
                </div>
                <div class="cart user">
                    <a href="{{ url('cart') }}">
                        <div>
                            <img class="svg"
                                 src="{{ url('assets/app/images/cart.svg') }}"
                                 alt="https://www.flaticon.com/authors/freepik"
                                 title="Items in cart">
                            <div>{{ auth()->user()->cart()->count() }}</div>
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
                                 title="Call">
                        </a>
                    </div>
                </div>
                <div>
                    <a href="tel:+1 912-252-7350">
                        +1 912-252-7350
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
