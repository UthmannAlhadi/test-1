<?php

namespace App\Http\Controllers;

use Stripe\StripeClient;
use Stripe\Webhook;
use App\Models\Payment; // Your Payment model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    //

    public function checkout(Request $request)
    {

        $price = session()->get('total_price');
        if (!$price) {
            return redirect()->back()->withErrors(['error' => 'Price not found.']);
        }

        $orderId = $this->generateOrderId(); // Generate a unique order ID
        $currentTime = Carbon::now('Asia/Kuala_Lumpur'); // Get the current timestamp

        // Store the order ID and total price in the trainings table
        $trainingIds = session()->get('uploaded_training_ids');
        DB::table('trainings')->whereIn('id', $trainingIds)->update([
            'order_id' => $orderId,
            'total_price' => $price,
            'time' => $currentTime
        ]);

        $stripeSecret = env('STRIPE_SECRET');
        \Log::info('STRIPE_SECRET value: ' . $stripeSecret);
        $stripe = new StripeClient($stripeSecret);

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
            'success_url' => route('payment.success', ['order_id' => $orderId]),
            'cancel_url' => route('user.print-preview'),
            'metadata' => [
                'order_id' => $orderId, // Pass the order ID to Stripe
            ],
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
        $orderId = $request->query('order_id');

        if (!$orderId) {
            return redirect()->route('user.print-preview')->withErrors(['error' => 'Order ID not found.']);
        }

        // Update the payment status in the database
        DB::table('trainings')->where('order_id', $orderId)->update(['payment_status' => 'Paid']);

        // Retrieve the trainings associated with this order ID
        // $trainings = Training::where('order_id', $orderId)->get();
        $trainings = Training::all();

        return view('user.print-history', compact('trainings', 'orderId'));
    }

    public function printHistory()
    {
        $orders = DB::table('trainings')
            ->select('order_id', DB::raw('SUM(total_price) as total_price'))
            ->where('payment_status', 'paid')
            ->groupBy('order_id')
            ->get();

        $trainingsByOrder = DB::table('trainings')
            ->whereIn('order_id', $orders->pluck('order_id'))
            ->get()
            ->groupBy('order_id');

        // Retrieve all trainings
        $trainings = Training::all();

        return view('user.print-history', compact('orders', 'trainingsByOrder', 'trainings'));
    }

    public function generateOrderId()
    {
        return strtoupper(Str::random(5)); // Generates a random string of 5 characters in uppercase
    }

}
