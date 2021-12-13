<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
    public function stripe()
    {      
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {   
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = \Stripe\Customer::create([
            'name' => 'Jenny Rosen',
            'email' => 'jenyy@hotmail.co.us',
            'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US',
            ],
        ]);

        \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $request->stripeToken]
        );

        Stripe\Charge::create ([
            "customer" => $customer->id,
            "amount" => 300 * 100,
            "currency" => "usd",
            "description" => "Test payment from stripe.test." , 
            ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
