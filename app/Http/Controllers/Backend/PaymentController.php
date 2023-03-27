<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\User;
use App\Models\Notification;

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
                    //Notification....
                    $notification = new Notification();
                    $notification->message = 'Deposit request is approved';
                    $notification->specific_user_id = $deposit->user_id;
                    $notification->notification_for = "user";
                    $deposit->deposit()->save($notification);
                    //Notification....
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

    public function showWithdrawRequest ()
    {
        $withdraws = Withdraw::orderBy('created_at','desc')->with('user')->Paginate(10);
        return view('backend.payment.show-withdraw', compact('withdraws'));
    }

    public function approveWithdraw ($id)
    {
        $withdraw = Withdraw::find($id);
        if($withdraw->is_approved==true){
            return redirect()->back()->with('Error','Already Approved!!');
        }
        if($withdraw){
            $user = User::where('id',$withdraw->user_id)->first();

            if($user){
                if($user->total_income>=$withdraw->withdraw_amount){
                    $withdraw->is_approved = true;
                if($withdraw->save()){
                    $final_income_amount = $user->total_income-$withdraw->withdraw_amount;
                    $user->total_income = $final_income_amount;
                    $user->save();
                    //Notification....
                    $notification = new Notification();
                    $notification->message = 'Withdraw request is approved';
                    $notification->specific_user_id = $withdraw->user_id;
                    $notification->notification_for = "user";
                    $withdraw->withdraw()->save($notification);
                    //Notification....
                    return redirect()->back()->with('Success',"Approved Successfully!");
                }
                return redirect()->back()->with('Error',"Technical Error!!");
                }

                else{
                    return redirect()->back()->with('Error',"Insufficient Balance!");
                }
            }

            else{
                return redirect()->back()->with('Error',"User Record is not Found!");
            }
        }
        else{
            return redirect()->back()->with('Error',"Withdraw Record is not Found!");
        }
    }
}
