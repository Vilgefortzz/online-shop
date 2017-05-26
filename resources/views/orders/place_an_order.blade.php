@extends('layouts.app_without_footer')

@section('content')
    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form id="order_form" class="form-horizontal" role="form" method="POST" action="{{ url('/placeAnOrder') }}">
                    {{ csrf_field() }}

                    {{--Personal data--}}
                    <div class="panel panel_without_border panel-default">
                        <div class="panel-heading panel-heading-fix text-center">
                            <h2 style="margin-top: 0">Your data</h2>
                        </div>

                        <div class="panel-body">
                            <div class="text-center" style="margin-bottom: 40px">
                                <div style="margin-bottom: 20px">
                                    <i>Buyer's data. Here write your personal data</i>
                                </div>
                                @if(Auth::check())
                                    <i>You can use button below to fill the inputs with your personal data immediately.</i>

                                    <br>

                                    <a id="fill_form" class="nice_links btn btn-default" href="{{ url('/users/'.Auth::user()->id.'/getPersonalData') }}">Fill inputs with your personal data</a>
                                @else
                                    <i><span><a href="{{ url('/login') }}" style="color: #8b102a">Log in</a></span> to faster fill out inputs with data you submitted in settings</i>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" required>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" required>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                <label for="street" class="col-md-4 control-label">Street and house number</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control" name="street" required>

                                    @if ($errors->has('street'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                <label for="postal_code" class="col-md-4 control-label">Postal code</label>

                                <div class="col-md-6">
                                    <input id="postal_code" type="text" class="form-control" name="postal_code" required>

                                    @if ($errors->has('postal_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" required>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="country" class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    <select id="country" name="country" class="form-control">

                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote D'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                        <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number" class="col-md-4 control-label">Phone number</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" required>

                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>
                            {{--Choose delivery method--}}
                            <div id="delivery_section" class="panel panel_without_border panel-default">
                                <div class="panel-heading panel-heading-fix text-center">
                                    <h2 style="margin-top: 0">Delivery methods</h2>
                                </div>

                                <div class="panel-body">
                                    <div class="text-center" style="margin-bottom: 40px">
                                        <div class="cc-selector">
                                            @foreach($deliveries as $delivery)
                                                @if($deliveries->first() == $delivery)
                                                    <input id="{{$delivery->name}}" type="radio" name="delivery_methods" checked="checked" value="{{$delivery->id}}" data-delivery-price="{{$delivery->price}}">
                                                    <label class="radio_nice" for="{{$delivery->name}}" style="background-image: url('{{$delivery->path_to_image}}')"></label>
                                                @else
                                                    <input id="{{$delivery->name}}" type="radio" name="delivery_methods" value="{{$delivery->id}}" data-delivery-price="{{$delivery->price}}">
                                                    <label class="radio_nice" for="{{$delivery->name}}" style="background-image: url('{{$delivery->path_to_image}}')"></label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{--Choose payment method--}}
                            <div id="payment_section" class="panel panel_without_border panel-default">
                                <div class="panel-heading panel-heading-fix text-center">
                                    <h2 style="margin-top: 0">Payment methods</h2>
                                </div>

                                <div class="panel-body">
                                    <div class="text-center" style="margin-bottom: 40px">
                                        <div class="cc-selector">
                                            @foreach($payments as $payment)
                                                @if($payments->first() == $payment)
                                                    <input id="{{$payment->name}}" type="radio" name="payment_methods" checked="checked" value="{{$payment->id}}" data-payment-name="{{$payment->name}}">
                                                    <label class="radio_nice" for="{{$payment->name}}" style="background-image: url('{{$payment->path_to_image}}')"></label>
                                                @else
                                                    <input id="{{$payment->name}}" type="radio" name="payment_methods" value="{{$payment->id}}" data-payment-name="{{$payment->name}}">
                                                    <label class="radio_nice" for="{{$payment->name}}" style="background-image: url('{{$payment->path_to_image}}')"></label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <a id="show_summary" href="#" class="btn btn-default">
                                Show summary
                            </a>

                            {{--Order summary--}}
                            <div id="summary_section" class="panel panel_without_border panel-default" hidden>
                                <div class="panel-heading panel-heading-fix text-center">
                                    <h2 style="margin-top: 0">Order summary</h2>
                                </div>

                                <div class="panel-body">
                                    <div class="text-center" style="margin-bottom: 40px">

                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                <tr>
                                                    <td><strong>Product</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                    <td class="text-right"><strong>Totals</strong></td>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @if(Session::has('cart'))
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td>{{$product['product']['name']}}</td>
                                                            <td class="text-center">${{$product['priceForOneItem']}}</td>
                                                            <td class="text-center">{{$product['quantity']}}</td>
                                                            <td class="text-right">${{$product['priceForAllItems']}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                    <td class="thick-line text-right">
                                                        <b><span id="subtotal" style="color: #720d18">${{number_format($totalPrice, 2, '.', '')}}</span></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                                    <td class="no-line text-right">
                                                        <b id="shipping" style="color: #134114"></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Discount</strong></td>
                                                    <td class="no-line text-right">
                                                        <b id="discount" style="color: #d77c1f">
                                                            @if(Auth::check())
                                                                ${{Auth::user()->discount}}
                                                            @else
                                                                $0
                                                            @endif
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Total</strong></td>
                                                    <td class="no-line text-right">
                                                        <b id="total_paid_for_order" style="color: #040648">${{number_format($totalPrice, 2, '.', '')}}</b>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div style="margin-bottom: 40px">
                                        <b>
                                            <p>E-mail: <span id="email_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>First name: <span id="first_name_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>Last name: <span id="last_name_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>Street and house number: <span id="street_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>Postal code: <span id="postal_code_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>City: <span id="city_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>Country: <span id="country_summary" style="font-style: italic; text-decoration: underline"></span></p>
                                            <p>Phone number: <span id="phone_number_summary" style="font-style: italic; text-decoration: underline"></span></p>

                                            <hr>
                                            <p><span class="glyphicon glyphicon-plane"></span>Chosen delivery method: <span id="delivery_method_summary" style="font-style: italic; text-decoration: underline; color: darkred"></span></p>
                                            <p><span class="glyphicon glyphicon-usd"></span>Price for delivery: <span id="delivery_method_summary_price" style="font-style: italic; text-decoration: underline; color: darkred"></span></p>
                                            <p><span class="glyphicon glyphicon-credit-card"></span>Chosen payment method: <span id="payment_method_summary" style="font-style: italic; text-decoration: underline; color: darkred"></span></p>
                                        </b>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div id="main_buttons" class="form-group" hidden>

                                <div class="checkbox">
                                    <label><input id="accept_terms" type="checkbox">I accept <a href="{{ url('/termsAndConditions') }}" class="nice_links">terms and conditions</a> and I checked correctness of all personal data</label>
                                </div>

                                <hr>
                                <button id="place_an_order_btn" type="submit" class="btn" disabled>
                                    Place an order
                                </button>

                                <div id="change_buttons" class="btn-group">
                                    <a href="/" class="btn btn-default nice_links">
                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                        Resign from order
                                    </a>

                                    <a id="change_data" href="#" class="btn btn-default nice_links">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        Change personal data, delivery method or payment
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/place_an_order.js') }}"></script>

@endsection
