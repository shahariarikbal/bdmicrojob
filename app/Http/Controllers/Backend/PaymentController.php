<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;

class PaymentController extends Controller
{
    public function showDepositRequest ()
    {
        $deposits = Deposit::orderBy('created_at','desc')->Paginate(10);
        return view('backend.payment.show-deposit', compact('deposits'));
    }

    public function approveDeposit ($id)
    {
        $deposit = Deposit::find($id);
        if($deposit->is_approved==true){
            return redirect()->back()->with('Error','Already Approved!!');
        }
        if($deposit){
            $user = User::where('id',$deposit->user_id)->first();

            if($user){
                $deposit->is_approved = true;
                if($deposit->save()){
                    $final_deposit_amount = $deposit->deposit_amount+$user->total_deposit;
                    $user->total_deposit = $final_deposit_amount;
                    $user->save();
                    return redirect()->back()->with('success',"Approved Successfully!");
                }
                return redirect()->back()->with('error',"Technical Error!!");
            }

            else{
                return redirect()->back()->with('error',"User Record is not Found!");
            }
        }
        else{
            return redirect()->back()->with('error',"Deposit Record is not Found!");
        }
    }
}
