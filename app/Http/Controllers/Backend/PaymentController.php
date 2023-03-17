<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;

class PaymentController extends Controller
{
    public function showDepositRequest ()
    {
        $deposits = Deposit::Paginate(10);
        return view('backend.payment.show-deposit', compact('deposits'));
    }
}
