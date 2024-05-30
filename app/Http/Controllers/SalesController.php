<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function displaySales()
    {

        return view('user.admin-sales');
    }
}
