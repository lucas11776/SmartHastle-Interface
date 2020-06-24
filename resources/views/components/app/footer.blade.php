@inject('categories', App\Category)
<footer class="footer pt-0 pt-sm-3 pt-lg-5">
    <div class="footer_content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 footer_col">
                    <div class="footer_about">
                        <div class="footer_logo">
                            <a href="#">
                                <div class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="footer_logo_icon">
                                        <img src="{{ url('assets/app/images/logo_2.png') }}"
                                             alt="">
                                    </div>
                                    <div>
                                        SmartHustle
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="footer_about_text">
                            <p>
                                SmartHustle the best of local design for hassles.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Footer Links -->
                <div class="col-lg-4 footer_col d-none">
                    <div class="footer_contact">
                        <div class="footer_title">
                            Stay in Touch
                        </div>
                        <div class="newsletter">
                            <form action="#" id="newsletter_form" class="newsletter_form">
                                <input type="email"
                                       class="newsletter_input"
                                       placeholder="Subscribe to our Newsletter"
                                       required="required">
                                <button class="newsletter_button">+</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Footer Contact -->
                <div class="col-lg-4 offset-lg-4 footer_col">
                    <div class="footer_contact">
                        <div class="footer_social">
                            <div class="footer_title">
                                Social
                            </div>
                            <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
                        <div class="copyright order-md-1 order-2">
                            Copyright &copy; SmartHustle {{ date('Y') }} |
                            <i class="fas fa-laptop-code"></i> Developer
                            <a href="http://themba.website"
                                _blank> themba.website
                            </a>
                        </div>
                        <nav class="footer_nav ml-md-auto order-md-2 order-1">
                            <ul class="d-flex flex-row align-items-center justify-content-start">
                                @foreach($categories::all() as $category)
                                    <li>
                                        <a href="{{ 'categories/' . $category->slug }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
