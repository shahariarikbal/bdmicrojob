<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Setting;
use App\Models\Commission;
use App\Models\Withdraw;
use App\Models\User;
use App\Models\Notification;

class PaymentController extends Controller
{
    public function showDepositRequest (Request $request)
    {
        visitor()->visit();
        $sql = Deposit::orderBy('created_at','desc');
        if (isset($request->from)) {
            $sql->whereDate('created_at', '>=', $request->from);
        }
        if (isset($request->to)) {
            $sql->whereDate('created_at', '<=', $request->to);
        }
        $deposits = $sql->Paginate(10);
        return view('backend.payment.show-deposit', compact('deposits'));
    }

    public function approveDeposit ($id)
    {
        $deposit = Deposit::find($id);
        if($deposit->is_approved=='1'){
            return redirect()->back()->with('Error','Already Approved!!');
        }
        if($deposit->is_approved=='2'){
            return redirect()->back()->with('Error','Already Rejected!!');
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

    public function rejectDeposit ($id)
    {
        $deposit = Deposit::find($id);
        if($deposit->is_approved=='1'){
            return redirect()->back()->with('Error','Already Approved!!');
        }
        if($deposit->is_approved=='2'){
            return redirect()->back()->with('Error','Already Rejected!!');
        }

        else{
            $deposit->is_approved = '2';
            $deposit->save();
            return redirect()->back()->with('error', 'Rejected Successfully');
        }
    }

    public function showWithdrawRequest (Request $request)
    {
        visitor()->visit();
        $sql = Withdraw::orderBy('created_at','desc')->with('user');
        if (isset($request->from)) {
            $sql->whereDate('created_at', '>=', $request->from);
        }
        if (isset($request->to)) {
            $sql->whereDate('created_at', '<=', $request->to);
        }
        $withdraws = $sql->Paginate(10);
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
                $total_amount = ((15*$withdraw->withdraw_amount)/100)+$withdraw->withdraw_amount;
                if($user->total_income>=$total_amount){
                    $withdraw->is_approved = true;
                if($withdraw->save()){
                    $final_income_amount = $user->total_income-$total_amount;
                    $user->total_income = $final_income_amount;
                    $user->save();
                    //Notification....
                    $notification = new Notification();
                    $notification->message = 'Withdraw request is approved';
                    $notification->specific_user_id = $withdraw->user_id;
                    $notification->notification_for = "user";
                    $withdraw->withdraw()->save($notification);
                    //Notification....

                    //Admin Commission Entry....
                    $withdraw_info = Setting::first();
                    $commission = new Commission();
                    $commission->type = 'withdraw';
                    $commission->amount = (($withdraw_info->withdraw_commission*$withdraw->withdraw_amount)/100);
                    $commission->save();
                    //Admin Commission Entry....

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
