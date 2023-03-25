<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\WithdrawRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdraw;
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

    public function showWithdraw()
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_email = $user->email;
            $user_name = $user->name;
            $user_phone = $user->phone;
            $user_nid_verification = $user->nid_verified;
            $total_income = $user->total_income;
            return view('frontend.auth.user.withdraw', compact('user_email','user_name','user_phone','user_nid_verification','total_income'));
        }
        return redirect('/login');
    }

    public function withdrawEarning (WithdrawRequest $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $withdraw = new Withdraw();

            $withdraw->user_id = $user->id;
            $withdraw->user_name = $request->user_name;
            $withdraw->user_phone = $request->user_phone;
            $withdraw->user_email = $request->user_email;
            $withdraw->user_address = $request->user_address;
            $withdraw->post_code = $request->post_code;
            $withdraw->city = $request->city;
            $withdraw->payment_gateway = $request->payment_gateway;
            $withdraw->payment_gateway_number = $request->payment_gateway_number;
            $withdraw->withdraw_amount = $request->withdraw_amount;
            $withdraw->save();

            //Email
               //withdraw Mail to Admin...
            //Email

            return redirect()->back()->with('Success','withdraw will be approved soon!!');
        }

        else{
            return redirect('/login');
        }
    }
}
