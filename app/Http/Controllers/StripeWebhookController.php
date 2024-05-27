<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Payment; // Your Payment model

class StripeWebhookController extends Controller
{
    //
    public function handleWebhook(Request $request)
    {
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the event
        if ($event['type'] == 'checkout.session.completed') {
            $session = $event['data']['object'];
            // Fulfill the purchase, e.g., save payment info in the database
            $payment = new Payment();
            $payment->user_id = auth()->user()->id; // Or get user ID from the session
            $payment->stripe_session_id = $session['id'];
            $payment->amount = $session['amount_total'];
            $payment->status = 'completed';
            $payment->save();
        }

        http_response_code(200);
    }
}
