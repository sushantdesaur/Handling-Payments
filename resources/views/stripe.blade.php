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
                                            <input type="text" name="country" class="form-control zip-code" id="floatingInputInvalid" placeholder="country" required>
                                            <label for="floatingInputInvalid">Country</label>
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
                                            <input autocomplete='off' class='form-control card-number' id="floatingInput" placeholder="Enter card number">
                                            <label for="floatingInput">Card Number</label> 
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12 ">
                                        <div class='form-floating cvc mb-3 required'>
                                            <input autocomplete='off' class='form-control card-cvc' id="floatingInput" placeholder="ex. 311">
                                            <label for="floatingInput">CVC</label>    
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12 ">
                                        <div class='form-floating expiration mb-3 required'>
                                            <input class='form-control card-expiry-month' id="floatingInput" placeholder='MM'>
                                            <label for="floatingInput">Expiration Month</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12">
                                        <div class='form-floating expiration mb-3 required'>
                                            <input class='form-control card-expiry-year' id="floatingInput" placeholder='YYYY'>
                                            <label for="floatingInput">Expiration Year</label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-xl-6 col-md-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
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




