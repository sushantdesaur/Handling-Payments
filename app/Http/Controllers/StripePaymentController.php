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
            'name' => $request->fname,
            'email' => $request->email,
            'address' => [
                'line1' => $request->ad_li_1,
                'postal_code' => $request->zip,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ],
        ]);

        \Stripe\Customer::createSource(
            $customer->id,
        
            ['source' => $request->stripeToken]
        );

        Stripe\Charge::create ([
            "customer" => $customer->id,
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "description" => "Test payment from stripe.test." , 
            ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }

    

        
    
}
