<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footerleft">
                <div class="logofooter"><img src="/images/icons/brand_logo.png" width="30" height="30">{{config('app.name')}}</div>
                <p><i>{{config('app.name')}} is the industry dealing with sales high quality products. We are working on the market since 1998.
                    Our values always be the same: provide the best equipment used to fighting, training and imitate the battles.
                        Our quality is confirmed by our satisfied customers which is the best prize helping us continue our mission.</i></p>
                <p><span class="glyphicon glyphicon-map-marker"></span><b> ul.XXXXXX 31 00-000 Kraków, Poland</b></p>
                <p><span class="glyphicon glyphicon-earphone"></span><b> Phone (Poland) : +48 000 000 000</b></p>
                <p><span class="glyphicon glyphicon-envelope"></span><b> E-mail : shop@gmail.com</b></p>
                <p><span class="glyphicon glyphicon-piggy-bank"></span><b> Bank account : 00 0000 0000 0000 0000 0000 0000 ING BANK ŚLĄSKI S.A. O./Kraków</b></p>

            </div>
            <div class="col-md-2 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">GENERAL LINKS</h6>
                <ul class="footer-ul">
                    <li><a href="{{ url('/aboutUs') }}"> About us</a></li>
                    <li><a href="{{ url('/termsAndConditions') }}"> Terms & Conditions</a></li>
                    <li><a href="{{ url('/faq') }}"> Frequently Ask Questions</a></li>
                </ul>
            </div>

            {{--Social media content--}}

            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">FIND US ON: </h6>
                <div class="text-center center-block">
                    <a href="https://www.facebook.com"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                    <a href="https://twitter.com"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="https://plus.google.com"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                </div>

                <h6 class="heading7">You have questions? Need help? Send e-mail:</h6>
                <div class="text-center center-block">
                    <a href="mailto:shop@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                </div>

                <h6 class="heading7">Or call us:</h6>
                <div class="text-center center-block">
                    <p><span class="glyphicon glyphicon-earphone"></span><b> Phone (Poland) : +48 000 000 000</b></p>
                </div>
            </div>

            {{--Subscribe to newsletter--}}
            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <div class="text-center center-block">
                    <div class="row">
                        <div class="center well well-sm text-center">
                            <h2>Newsletter</h2>

                            <p>Subscribe to our weekly Newsletter and stay tuned.</p>

                            <form role="form" action="{{ url('/subscribe') }}" method="POST">
                                {{csrf_field()}}
                                <div class="input-group form-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input id="email" name="email" class="form-control" type="text" placeholder="your@email.com" required>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default" style="margin-top: 10px">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{--Copyright, author--}}
<div class="copyright">
    <div class="container text-center">
        <p>© 2017 Grzegorz Klimek</p>
    </div>
</div>