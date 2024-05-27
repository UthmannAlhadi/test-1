<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use Stripe\Webhook;
use App\Models\Payment; // Your Payment model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Training;

class StripePaymentController extends Controller
{
    //

    public function checkout(Request $request)
    {
        $price = session()->get('total_price');
        if (!$price) {
            return redirect()->back()->withErrors(['error' => 'Price not found.']);
        }

        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'unit_amount' => $price * 100,
                        'product_data' => [
                            'name' => 'Print Service',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('user.print-preview'),
        ]);

        // Debugging to log session data before clearing
        \Log::info('Session data before clearing in checkout: ', session()->all());

        // Clear session data related to print-preview and training-list
        session()->forget(['total_price', 'trainings', 'uploaded_training_ids']);
        Session::forget('printing_color_option');
        Session::forget('layout_option');
        Session::forget('copies');
        Session::forget('total_price');
        Session::forget('trainings');
        Session::forget('uploaded_training_ids');
        Session::forget('total_pages');
        Session::forget('training_page');
        Session::forget('page');
        Session::forget('image_path');
        Session::forget('training');

        // Debugging to log session data after clearing
        \Log::info('Session data after clearing in checkout: ', session()->all());

        return redirect()->to($session->url);
    }

    public function success(Request $request)
    {
        // Retrieve the uploaded training IDs from the session
        $uploadedTrainingIds = Session::get('uploaded_training_ids', []);
        // Debugging statement to check session data before clearing
        \Log::info('Session data before clearing in success: ', session()->all());

        // Clear the session data
        session()->forget(['total_price', 'trainings', 'uploaded_training_ids']);
        // Additionally, you may want to delete the training records if necessary
        $uploadedTrainingIds = Session::get('uploaded_training_ids', []);
        Training::destroy($uploadedTrainingIds);

        // Debugging statement to check session data after clearing
        \Log::info('Session data after clearing in success: ', session()->all());

        return redirect()->route('user.print-history')->with('message', 'Payment successful!');
    }

}
