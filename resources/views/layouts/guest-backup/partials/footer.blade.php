

<footer class="footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget widget-brand">
                        <div class="logo logo-footer">
                            <a href="{{route('welcome')}}">
                                <img src="{{asset('storage/'.setting('site_logo'))}}" alt="image">
                            </a>
                        </div>
                        <p>Cryptocurrency Investment Solutions Made Simple</p>
                    </div><!-- /.widget-brand -->
                    <div class="widget widget-social">
                        <h5 class="widget-title">Follow Us</h5>
                        <div class="social-list">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>
                </div><!-- /.col-md-4 -->

                <div class="col-md-4">
                    <div class="wiget widget-services">
                        <div class="one-half">
                            <h5 class="widget-title">
                                RESOURCES
                            </h5>
                            <ul>
                                <li><a href="{{route('coin')}}">COIN</a></li>
                                <li><a href="{{route('buysell')}}">BUY AND SELL</a></li>
                                <li><a href="{{route('market')}}">MARKET DATA</a></li>
                                <li><a href="{{route('exchange')}}">EXCHANGE</a></li>
                                <li><a href="{{route('partners')}}">PARTNER</a></li>
                                <li><a href="{{route('portfolio')}}">PORTOFOLIO</a></li>
                                <li><a href="{{route('history')}}">HISTORY</a></li>
                                <li><a href="{{route('approach')}}">APPROACH</a></li>
                            </ul>
                        </div>
                        <div class="one-half padding_left_73">
                            <h5 class="widget-title">
                                SHORT LINK
                            </h5>
                            <ul>
                                <li><a href="{{route('careers')}}">CAREERS</a></li>
                                <li><a href="{{route('testimonials')}}">TESTIMONIALS</a></li>
                                <li><a href="{{route('team')}}">TEAMS</a></li>
                                <li><a href="{{route('contact')}}">CONTACT US</a></li>
                            </ul>
                        </div>
                    </div><!-- /.widget-services -->
                </div><!-- /.col-md-4 -->

                <div class="col-md-4">
                    <div class="widget widget-subscribe">
                        <h5 class="widget-title">
                            Subscribe
                        </h5>
                        <p>Sign up for our mailing list to get latest updates and offers</p>
                        <form method="post" action="#" id="subscribe-form" data-mailchimp="true">
                            <div id="subscribe-content">
                                <div class="input">
                                    <input type="text" id="subscribe-email" name="subscribe-email" placeholder="Your email address">
                                </div>
                                <div class="button">
                                    <button type="button" id="subscribe-button" class="bg_color1" title="Subscribe now"><i class="fa fa-paper-plane-o"></i></button>
                                </div>
                            </div>
                        </form>
                        <p>
                            Working Hours : Monday-Saturday<br/><span>Close : Sunday</span>
                        </p>
                    </div>
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-widgets -->
</footer><!-- /.footer -->

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="copyright text-center">Copyright @2020 <a href="{{route('welcome')}}"> CryptoStreetMarket </a></p>
            </div>
        </div>
    </div>
</div><!-- /.footer-bottom -->

<!-- Go Top -->
<a class="go-top">
    <i class="fa fa-chevron-up"></i>
</a>
