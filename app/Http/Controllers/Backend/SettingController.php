<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function showSetting ()
    {
        visitor()->visit();
        $setting = Setting::first();
        return view ('backend.setting.show-setting', compact('setting'));
    }

    public function updateSetting (Request $request)
    {
        $setting = Setting::first();
        if($request->hasFile('logo')){
            if(file_exists(public_path('setting/'.$setting->logo))){
                File::delete(public_path('setting/'.$setting->logo));
                $name = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move('setting/', $name);
                $setting->logo = $name;
            }
            else{
                $name = time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move('setting/', $name);
                $setting->logo = $name;
            }

        }
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->instagram = $request->instagram;
        $setting->address = $request->address;
        $setting->adsense_code = $request->adsense_code;
        $setting->save();
        return redirect()->back()->with('Success','Settings are updated successfully!!');
    }
}
