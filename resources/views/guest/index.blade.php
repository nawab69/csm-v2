@extends('layouts.guest.app')
@section('title','Homepage')
    @section('content')
        <!-- Slider Starts -->
        <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators Starts -->
            <ol class="carousel-indicators visible-lg visible-md">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!-- Indicators Ends -->
            <!-- Carousel Inner Starts -->
            <div class="carousel-inner">
                <!-- Carousel Item Starts -->
                <div class="item active bg-parallax item-1">
                    <div class="slider-content">
                        <div class="container">
                            <div class="slider-text text-center">
                                <h3 class="slide-title"><span>Cryptocurrency</span> <br> Investment Solutions
                                    <br> Made <span>Simple</span>
                                <p>
                                    <a href="{{route('register')}}" class="slider btn btn-primary">Get Started</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
                <!-- Carousel Item Starts -->
                <div class="item bg-parallax item-2">
                    <div class="slider-content">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="slider-text text-center">
                                    <h3 class="slide-title"><span>Invest</span> In <br> <span>Cryptocurrency</span> <br> The Smart Way</h3>
                                    <p>
                                        <a href="{{route('about')}}" class="slider btn btn-primary">Learn More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item Ends -->
            </div>
            <!-- Carousel Inner Ends -->
            <!-- Carousel Controlers Starts -->
            <a class="left carousel-control" href="index.html#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="index.html#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
            <!-- Carousel Controlers Ends -->
        </div>
        <!-- Slider Ends -->
        <!-- Features Section Starts -->
        <section class="features">
            <div class="container">
                <div class="row features-row">
                    <!-- Feature Box Starts -->
                    <div class="feature-box col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img src="assets/bayya/images/icons/orange/download-bitcoin.png" alt="download bitcoin">
						</span>
                        <div class="feature-box-content">
                            <h3>Fast Transactions</h3>
                            <p>Ultra-fast transactions mean you get accurate trading prices the second you acquire coins</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box two col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img src="assets/bayya/images/icons/orange/add-bitcoins.png" alt="add bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Secure and Stable</h3>
                            <p>Rely on a super dependable blockchain infrastructure built by IT & Cryptoexperts </p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
                    <div class="feature-box three col-md-4 col-sm-12">
                        <span class="feature-icon">
							<img src="assets/bayya/images/icons/orange/buy-sell-bitcoins.png" alt="buy and sell bitcoins">
						</span>
                        <div class="feature-box-content">
                            <h3>Mobile Apps</h3>
                            <p>Always stay informed with a powerful mobile app to help you trade on the go</p>
                        </div>
                    </div>
                    <!-- Feature Box Ends -->
                </div>
            </div>
        </section>
        <!-- Features Section Ends -->
        <!-- About Section Starts -->
        <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">About <span>Us</span></h2>
                    <div class="title-head-subtitle">
                        <p>a commercial website that lists wallets, exchanges and other bitcoin related info</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img class="img-responsive img-about-us" src="assets/bayya/images/about-us.png" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about">WE ARE CRYPTO STREET MARKET</h3>
                        <p class="about-text">A place for everyone who wants to simply buy and sell Bitcoins. Deposit funds using your Visa/MasterCard or bank transfer. Instant buy/sell of Bitcoins at fair price is guaranteed. Nothing extra. Join over 700,000 users from all over the world satisfied with our services.</p>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Our Mission</a></li>
                            <li><a data-toggle="tab" href="#menu2">Our advantages</a></li>
                            <li><a data-toggle="tab" href="#menu3">Our guarantees</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>Bitcoin is based on a protocol known as the blockchain, which allows to create, transfer and verify ultra-secure financial data without interference of third parties.</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p>Our mission as an official partner of Bitcoin Foundation is to help you enter and better understand the world of #1 cryptocurrency and avoid any issues you may encounter.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p>We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are the first and the best in cryptocurrency. </p>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="about.html">Read More</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-8 ts-padding img-block-left">
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img src="assets/bayya/images/icons/orange/strong-security.png" alt="strong security"/>
									</span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Protection against DDoS attacks, <br>full data encryption</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img src="assets/bayya/images/icons/orange/world-coverage.png" alt="world coverage"/>
									</span>
                                    <h3 class="feature-title">World Coverage</h3>
                                    <p>Providing services in 99% countries<br> around all the globe</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img src="assets/bayya/images/icons/orange/payment-options.png" alt="payment options"/>
									</span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>Popular methods: Visa, MasterCard, <br>bank transfer, cryptocurrency</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img src="assets/bayya/images/icons/orange/mobile-app.png" alt="mobile app"/>
									</span>
                                    <h3 class="feature-title">Mobile App</h3>
                                    <p>Trading via our Mobile App, Available<br> in Play Store & App Store</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img src="assets/bayya/images/icons/orange/cost-efficiency.png" alt="cost efficiency"/>
									</span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>Reasonable trading fees for takers<br> and all market makers</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
										<img src="assets/bayya/images/icons/orange/high-liquidity.png" alt="high liquidity"/>
									</span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=0gv7OC9L2s8"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        <!-- Pricing Starts -->
        <section class="pricing">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">affordable <span>packages</span></h2>
                    <div class="title-head-subtitle">
                        <p>Purchase Bitcoin using a credit card or with your linked bank account</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row pricing-tables-content">
                    <div class="pricing-container">
                        <!-- Pricing Switcher Starts -->
                        <div class="pricing-switcher">
                            <p>
                                <input type="radio" name="switch" value="buy" id="buy-1" checked>
                                <label for="buy-1">BUY</label>
                                <input type="radio" name="switch" value="sell" id="sell-1">
                                <label for="sell-1">SELL</label>
                                <span class="switch"></span>
                            </p>
                        </div>
                        <!-- Pricing Switcher Ends -->
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #1 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>GET 0.007 BTC <span>For </span></h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">100</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #1 Ends -->
                                    <!-- Sell Pricing Table #1 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>GET 100 USD <span>For </span></h2>

                                            <div class="price">
                                                <span class="currency"><i class="fa fa-bitcoin"></i></span>
                                                <span class="value">0.2</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #1 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #2 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>GET 0.015 BTC <span>For </span></h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">300</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #2 Ends -->
                                    <!-- Sell Pricing Table #2 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>GET 1000 USD <span>For </span></h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-bitcoin"></i></span>
                                                <span class="value">0.5</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #2 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #3 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>GET 0.031 BTC <span>For </span></h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">500</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #3 Ends -->
                                    <!-- Yearlt Pricing Table #3 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>GET 3000 USD <span>For </span></h2>

                                            <div class="price">
                                                <span class="currency"><i class="fa fa-bitcoin"></i></span>
                                                <span class="value">1</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #3 Ends -->
                                </ul>
                            </li>
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <!-- Buy Pricing Table #4 Starts -->
                                    <li data-type="buy" class="is-visible">
                                        <header class="pricing-header">
                                            <h2>GET 0.081 BTC <span>For </span></h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-dollar"></i></span>
                                                <span class="value">1,000</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Buy Pricing Table #4 Ends -->
                                    <!-- Sell Pricing Table #4 Starts -->
                                    <li data-type="sell" class="is-hidden">
                                        <header class="pricing-header">
                                            <h2>GET 9000 USD <span>For </span></h2>
                                            <div class="price">
                                                <span class="currency"><i class="fa fa-bitcoin"></i></span>
                                                <span class="value">2</span>
                                            </div>
                                        </header>
                                        <footer class="pricing-footer">
                                            <a href="#" class="btn btn-primary">ORDER NOW</a>
                                        </footer>
                                    </li>
                                    <!-- Sell Pricing Table #4 Ends -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        <!-- Bitcoin Calculator Section Starts -->
        <section class="bitcoin-calculator-section">
            <div class="container">
                <div class="row">
                    <!-- Section Heading Starts -->
                    <div class="col-md-12">
                        <h2 class="title-head text-center"><span>Bitcoin</span> Calculator</h2>
                        <p class="message text-center">Find out the current Bitcoin value with our easy-to-use converter</p>
                    </div>
                    <!-- Section Heading Ends -->
                    <!-- Bitcoin Calculator Form Starts -->
                    <div class="col-md-12 text-center">
                        <form class="bitcoin-calculator" id="bitcoin-calculator">
                            <!-- Input #1 Starts -->
                            <input class="form-input" name="btc-calculator-value" value="1">
                            <!-- Input #1 Ends -->
                            <div class="form-info"><i class="fa fa-bitcoin"></i></div>
                            <div class="form-equal">=</div>
                            <!-- Input/Result Starts -->
                            <input class="form-input form-input-result" name="btc-calculator-result">
                            <!-- Input/Result Ends -->
                            <!-- Select Currency Starts -->
                            <div class="form-wrap">
                                <select id="currency-select" class="form-input select-currency select-primary" name="btc-calculator-currency" data-dropdown-class="select-primary-dropdown"></select>
                            </div>
                            <!-- Select Currency Ends -->
                        </form>
                        <p class="info"><i>* Data updated every 15 minutes</i></p>
                    </div>
                    <!-- Bitcoin Calculator Form Ends -->
                </div>
            </div>
        </section>
        <!-- Bitcoin Calculator Section Ends -->
        <!-- Team Section Starts -->
        <section class="team">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">our <span>experts</span></h2>
                    <div class="title-head-subtitle">
                        <p> A talented team of Cryptocurrency experts based in London</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Team Members Starts -->
                <div class="row team-content team-members">
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member1.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Lina Marzouki</h4>
                                <p>Ceo Founder</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member2.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Marco Verratti</h4>
                                <p>Director</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <!-- Team Member-->
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member3.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Emilia Bella</h4>
                                <p>Bitcoin Consultant</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                    <!-- Team Member Starts -->
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="team-member">
                            <!-- Team Member Picture Starts -->
                            <img src="assets/bayya/images/team/member4.jpg" class="img-responsive" alt="team member">
                            <!-- Team Member Picture Ends -->
                            <!-- Team Member Details Starts -->
                            <div class="team-member-caption social-icons">
                                <h4>Antonio Conte</h4>
                                <p>Bitcoin Developer</p>
                                <ul class="list list-inline social">
                                    <li>
                                        <a href="#" class="fa fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fa fa-google-plus"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Team Member Details Ends -->
                        </div>
                    </div>
                    <!-- Team Member Ends -->
                </div>
                <!-- Team Members Ends -->
            </div>
        </section>
        <!-- Team Section Ends -->
        <!-- Quote and Chart Section Starts -->
        <section class="image-block2">
            <div class="container-fluid">
                <div class="row">
                    <!-- Quote Starts -->
                    <div class="col-md-4 img-block-quote bg-image-2">
                        <blockquote>
                            <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
                            <footer><img src="assets/bayya/images/ceo.jpg" alt="ceo" /> <span>Marc Smith</span> - CEO</footer>
                        </blockquote>
                    </div>
                    <!-- Quote Ends -->
                    <!-- Chart Starts -->
                    <div class="col-md-8 bg-grey-chart">
                        <div class="chart-widget dark-chart chart-1">
                            <div>
                                <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Ends -->
                </div>
            </div>
        </section>
        <!-- Quote and Chart Section Ends -->
{{--        <!-- Blog Section Starts -->--}}
{{--        <section class="blog">--}}
{{--            <div class="container">--}}
{{--                <!-- Section Title Starts -->--}}
{{--                <div class="row text-center">--}}
{{--                    <h2 class="title-head">Bitcoin <span>News</span></h2>--}}
{{--                    <div class="title-head-subtitle">--}}
{{--                        <p>Discover latest news about Bitcoin on our blog</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Section Title Ends -->--}}
{{--                <!-- Section Content Starts -->--}}
{{--                <div class="row latest-posts-content">--}}
{{--                    <!-- Article Starts -->--}}
{{--                    <div class="col-sm-4 col-md-4 col-xs-12">--}}
{{--                        <div class="latest-post">--}}
{{--                            <!-- Featured Image Starts -->--}}
{{--                            <a href="blog-post.html"><img class="img-responsive" src="assets/bayya/images/blog/blog-post-small-1.jpg" alt="img"></a>--}}
{{--                            <!-- Featured Image Ends -->--}}
{{--                            <!-- Article Content Starts -->--}}
{{--                            <div class="post-body">--}}
{{--                                <h4 class="post-title">--}}
{{--                                    <a href="blog-post.html">How Cryptocurrency Begun and Its Impact To Financial Transactions</a>--}}
{{--                                </h4>--}}
{{--                                <div class="post-text">--}}
{{--                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <span>01</span>--}}
{{--                                <span>JAN</span>--}}
{{--                            </div>--}}
{{--                            <a href="blog-post.html" class="btn btn-primary">read more</a>--}}
{{--                            <!-- Article Content Ends -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Article Ends -->--}}
{{--                    <!-- Article Starts -->--}}
{{--                    <div class="col-sm-4 col-md-4 col-xs-12">--}}
{{--                        <div class="latest-post">--}}
{{--                            <!-- Featured Image Starts -->--}}
{{--                            <a href="blog-post.html"><img class="img-responsive" src="assets/bayya/images/blog/blog-post-small-2.jpg" alt="img"></a>--}}
{{--                            <!-- Featured Image Ends -->--}}
{{--                            <!-- Article Content Starts -->--}}
{{--                            <div class="post-body">--}}
{{--                                <h4 class="post-title">--}}
{{--                                    <a href="blog-post.html">Cryptocurrency - Who Are Involved With It? Words about members</a>--}}
{{--                                </h4>--}}
{{--                                <div class="post-text">--}}
{{--                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <span>17</span>--}}
{{--                                <span>MAR</span>--}}
{{--                            </div>--}}
{{--                            <a href="blog-post.html" class="btn btn-primary">read more</a>--}}
{{--                            <!-- Article Content Ends -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Article Ends -->--}}
{{--                    <!-- Article Start -->--}}
{{--                    <div class="col-sm-4 col-md-4 col-xs-12">--}}
{{--                        <div class="latest-post">--}}
{{--                            <!-- Featured Image Starts -->--}}
{{--                            <a href="blog-post.html"><img class="img-responsive" src="assets/bayya/images/blog/blog-post-small-3.jpg" alt="img"></a>--}}
{{--                            <!-- Featured Image Ends -->--}}
{{--                            <!-- Article Content Starts -->--}}
{{--                            <div class="post-body">--}}
{{--                                <h4 class="post-title">--}}
{{--                                    <a href="blog-post.html">Risks & Rewards Of Investing In Bitcoin. Pros and Cons</a>--}}
{{--                                </h4>--}}
{{--                                <div class="post-text">--}}
{{--                                    <p>incididunt ut labore et dolore magna aliqua. Ut enim aminim veniam, quis nostrud...</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="post-date">--}}
{{--                                <span>25</span>--}}
{{--                                <span>FEB</span>--}}
{{--                            </div>--}}
{{--                            <a href="blog-post.html" class="btn btn-primary">read more</a>--}}
{{--                            <!-- Article Content Ends -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Section Content Ends -->--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <!-- Blog Section Ends -->--}}
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
            <div class="call-action-all-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Call To Action Text Starts -->
                            <div class="action-text">
                                <h2>Get Started Today With Bitcoin</h2>
                                <p class="lead">Open account for free and start trading Bitcoins!</p>
                            </div>
                            <!-- Call To Action Text Ends -->
                            <!-- Call To Action Button Starts -->
                            <p class="action-btn"><a class="btn btn-primary" href="{{route('register')}}">Register Now</a></p>
                            <!-- Call To Action Button Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action Section Ends -->

    @endsection
