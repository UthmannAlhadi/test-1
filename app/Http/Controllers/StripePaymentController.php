<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use Stripe\Webhook;
use App\Models\Payment; // Your Payment model
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    //

    public function checkout(Request $request)
    {
        // Get the price from the session
        $price = session()->get('total_price');

        // Ensure the price is valid
        if (!$price) {
            // Handle the case where the price is not set in the session
            return redirect()->back()->withErrors(['error' => 'Price not found.']);
        }

        // Initialize Stripe client
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        // Create a Stripe Checkout session
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'unit_amount' => $price * 100, // Convert price to cents
                        'product_data' => [
                            'name' => 'Print Service',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('user.print-preview'),
        ]);

        // Redirect the user to the Stripe Checkout page
        return redirect()->to($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        // Retrieve the session ID from the request
        $session_id = $request->get('session_id');

        if (!$session_id) {
            return redirect()->route('user.print-preview')->withErrors(['error' => 'Session ID not found.']);
        }

        // Initialize Stripe client
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        // Retrieve the checkout session
        $session = $stripe->checkout->sessions->retrieve($session_id);

        // Retrieve payment intent
        $paymentIntent = $stripe->paymentIntents->retrieve($session->payment_intent);

        // Save payment details to the database
        $payment = new Payment();
        $payment->user_id = auth()->id();
        $payment->stripe_session_id = $session_id;
        $payment->amount = $paymentIntent->amount;
        $payment->status = $paymentIntent->status;
        $payment->save();

        return redirect()->route('print.history')->with('success', 'Payment successful!');
    }

}
