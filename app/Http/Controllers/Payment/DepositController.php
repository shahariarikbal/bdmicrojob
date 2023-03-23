<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deposit;
use Auth;

class DepositController extends Controller
{
    public function showDeposit()
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_email = $user->email;
            $user_name = $user->name;
            $user_phone = $user->phone;
            return view('frontend.auth.user.deposit', compact('user_email','user_name','user_phone'));
        }
        return redirect('/login');
    }

    public function storeDeposit (DepositRequest $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $deposit = new Deposit;
            if($request->hasFile('screenshot')){
                $name = time() . '.' . $request->screenshot->getClientOriginalExtension();
                $request->screenshot->move('deposit/', $name);
                $deposit->screenshot = $name;
            }
            $deposit->user_id = $user->id;
            $deposit->user_name = $request->user_name;
            $deposit->user_phone = $request->user_phone;
            $deposit->user_email = $request->user_email;
            $deposit->user_address = $request->user_address;
            $deposit->post_code = $request->post_code;
            $deposit->city = $request->city;
            $deposit->payment_gateway = $request->payment_gateway;
            $deposit->transaction_id = $request->transaction_id;
            $deposit->deposit_amount = $request->deposit_amount;
            $deposit->save();

            //Email
               //Deposit Mail to Admin...
            //Email

            return redirect()->back()->with('Success','Deposit will be approved soon!!');
        }

        else{
            return redirect('/login');
        }
    }
}
