<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PrintHistoryController extends Controller
{
    //

    public function index()
    {
        $user_id = auth()->id();
        $payments = Payment::where('user_id', auth()->id())->get();
        return view('user.print-history', compact('payments'));
    }
}
