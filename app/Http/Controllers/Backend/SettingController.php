<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use function PHPUnit\Framework\isEmpty;

class SettingController extends Controller
{
    public function index()
    {
       $setting = Setting::first();
      // print_r($setting);
        if ($setting === null)
       {
           $setting = new Setting();
           $setting->title = 'Project Title';
           $setting->save();
           $setting = Setting::first();
       }
        return view ('backend.pages.setting.edit', compact('setting'));

    }


    public function update(SettingRequest $request)
    {

        $id = $request->id;
        $setting = Setting::find($id);
        $setting->title        = $request->title;
        $setting->keywords     = $request->keywords;
        $setting->description  = $request->description;
        $setting->company      = $request->company;
        $setting->address      = $request->address;
        $setting->phone        = $request->phone;
        $setting->fax          = $request->fax;
        $setting->email        = $request->email;
        $setting->smtpserver   = $request->smtpserver;
        $setting->smtpemail    = $request->smtpemail;
        $setting->smtppassword = $request->smtppassword;
        $setting->smtpport     = $request->port;
        $setting->facebook     = $request->facebook;
        $setting->instagram    = $request->instagram;
        $setting->twitter      = $request->twitter;
        $setting->aboutus      = $request->aboutus;
        $setting->contact      = $request->contact;
        $setting->references   = $request->references;
        $setting->status       = $request->status;
        //dd($setting);
        $setting->save();
        return redirect()->route('backend.setting.index');
    }
}
