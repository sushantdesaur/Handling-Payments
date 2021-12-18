@extends('welcome')

@section('title', 'Stripe Payment Gateway')

@section('navbar')
@endsection

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white m-0" >Payment Details</h3>
                </div>
                <div class="card-body" >
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <form 
                        role="form" 
                        action="{{ route('stripe.post') }}" 
                        method="post" 
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        <div class="row">
                            {{-- Billing Info --}}
                            <div class="col-xl-6 col-md-12">
                                <div class="row">
                                    <div class="col-xl-6 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text" name="fname" class='form-control required' id="floatingInputInvalid" placeholder="First Name" required> 
                                            <label for="floatingInputInvalid">First Name</label>             
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text" name="lname" class='form-control lname required' id="floatingInputInvalid" placeholder="Last Name" required> 
                                            <label for="floatingInputInvalid">Last Name</label>             
                                        </div>                                
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="email" name="email" class="form-control email" id="floatingInputInvalid" placeholder="name@example.com" required>
                                            <label for="floatingInputInvalid">Email address</label>
                                        </div>                                
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text"  name="ad_li_1" class="form-control ad-li-1" id="floatingInputInvalid" placeholder="Address Line 1" required>
                                            <label for="floatingInputInvalid">Adress Line 1</label>
                                        </div>                                
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text" name="ad_li_2" class="form-control ad-li-2" id="floatingInputInvalid" placeholder="Address Line 2" required>
                                            <label for="floatingInputInvalid">Adress Line 2</label>
                                        </div>                                
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text" name="city" class="form-control city" id="floatingInputInvalid" placeholder="City or Village" required>
                                            <label for="floatingInputInvalid">City or Village</label>
                                        </div>                                
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text" name="state" class="form-control state" id="floatingInputInvalid" placeholder="State" required>
                                            <label for="floatingInputInvalid">State</label>
                                        </div>                                
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="form-floating mb-3 required">
                                            <input type="text" name="zip" class="form-control zip-code" id="floatingInputInvalid" placeholder="Zip Code" required>
                                            <label for="floatingInputInvalid">Zip Code</label>
                                        </div>                                
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="form-floating mb-3">
                                            <select id="floatingInputInvalid" name="country" class="form-control" required>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AG">Antigua & Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BQ">Bonaire</option>
                                                <option value="BA">Bosnia & Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Ter</option>
                                                <option value="BN">Brunei</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="Canary Islands">Canary Islands</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="Channel Islands">Channel Islands</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos Island</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Cote DIvoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curacao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Ter</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="Great Britain">Great Britain</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GG">Guatemala</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IN">India</option>
                                                <option value="IR">Iran</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea North</option>
                                                <option value="KR">Korea South</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Laos</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="Mu">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="Midway Islands">Midway Islands</option>
                                                <option value="MD">Moldova</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Nambia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                <option value="NL">Netherlands (Holland, Europe)</option>
                                                <option value="Nevis">Nevis</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau Island</option>
                                                <option value="PS">Palestine</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="Py">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="PL">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russia</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">St Barthelemy</option>
                                                <option value="St Eustatius">St Eustatius</option>
                                                <option value="SH">St Helena</option>
                                                <option value="KN">St Kitts-Nevis</option>
                                                <option value="LC">St Lucia</option>
                                                <option value="MF">St Maarten</option>
                                                <option value="PM">St Pierre & Miquelon</option>
                                                <option value="VC">St Vincent & Grenadines</option>
                                                <option value="Saipan">Saipan</option>
                                                <option value="WS">Samoa</option>
                                                <option value="Samoa American">Samoa American</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome & Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="Sr">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SE">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="SY">Syria</option>
                                                <option value="Tahiti">Tahiti</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TG">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="TT">Trinidad & Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks & Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="US">United States of America</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="Vatican City State">Vatican City State</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="VG">Virgin Islands (Brit)</option>
                                                <option value="VI">Virgin Islands (USA)</option>
                                                <option value="Wake Island">Wake Island</option>
                                                <option value="WF">Wallis & Futana Is</option>
                                                <option value="YE">Yemen</option>
                                                <option value="Zaire">Zaire</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                             </select>
                                            {{-- <input type="text" name="country" class="form-control zip-code" id="floatingInputInvalid" placeholder="country" required>
                                            <label for="floatingInputInvalid">Country</label> --}}
                                        </div>                                
                                    </div>
                                    <div class="col-xl-8 col-md-12">
                                        <div class="form-floating mb-3 ">
                                            <input type="text" name="phone" class="form-control phone" id="floatingInputInvalid" placeholder="Contact Number" required>
                                            <label for="floatingInputInvalid">Contact Number</label>
                                        </div>                                
                                    </div>
                                </div>
                            </div>


                            {{-- Card Column --}}
                            <div class="col-xl-6 col-md-12">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12">
                                        <div class='form-floating card mb-3 required'>
                                            <input autocomplete='off' name="course" class='form-control course-name' id="floatingInput" placeholder="Course Name">
                                            <label for="floatingInput">Course Name</label> 
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div class='form-floating card mb-3 required'>
                                            <input autocomplete='off'  name="amount" class='form-control amount' id="floatingInput" placeholder="Amount">
                                            <label for="floatingInput">Amount</label> 
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12">
                                        <div class='form-floating card mb-3 required'>
                                            <input autocomplete='off' class='form-control card-number' id="floatingInput" placeholder="Enter card number" maxlength="19" required>
                                            <label for="floatingInput">Card Number</label> 
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12 ">
                                        <div class='form-floating cvc mb-3 required'>
                                            <input autocomplete='off' class='form-control card-cvc' id="floatingInput" placeholder="ex. 311" maxlength="3" required>
                                            <label for="floatingInput">CVC</label>    
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12 ">
                                        <div class='form-floating expiration mb-3 required'>
                                            <input class='form-control card-expiry-month' id="floatingInput" placeholder='MM' maxlength="2" required>
                                            <label for="floatingInput">Expiration Month</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12">
                                        <div class='form-floating expiration mb-3 required'>
                                            <input class='form-control card-expiry-year' id="floatingInput" placeholder='YYYY' maxlength="4" required>
                                            <label for="floatingInput">Expiration Year</label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-xl-6 col-md-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                        
                            {{-- <div class='form-row row'>
                                <div class='col-md-12 error form-floating hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div> --}}            
                    </form>                 
                </div>
            </div>        
        </div>
    </div>
</div>
    
<script type="text/javascript" src="https://js.stripe.com/v2"></script>

<script type="text/javascript">
$(function() {
   
    var $form = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>

@endsection




