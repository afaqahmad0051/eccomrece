<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51M434WLHUfosJYdWb82SP27BL52NgsVVfVOX6cfGP9JEI87XknuZ4SJ8C5HPidIBDBxtlgWg90PqTSdiHWMZhtfo00WCCjxVoQ');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => 999*100,
        'currency' => 'usd',
        'description' => 'Flipmart',
        'source' => $token,
        'metadata' => ['order_id' => '6735'],
        ]);
        dd($charge);
    }
}
