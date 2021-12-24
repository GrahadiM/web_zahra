<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingWebsite;
use Illuminate\Support\Facades\File;

class SettingWebsiteController extends Controller
{
    public function index()
    {
        $setting = SettingWebsite::get()->first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, SettingWebsite $setting)
    {
        $this->validate($request, [
            'app_name' => 'required|string|max:25',
            'footer_name' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'favicon' => 'nullable|mimes:jpg,png,jpeg,ico|max:1000',            
        ]);

        $data = $request->only(['app_name', 'footer_left', 'footer_right']);

        if($request->hasFile('logo')){
            // $logo = $request->logo->store('logo');
            $logo = $this->uploadGambar($request->logo);

            if($setting->logo !== "logo_default.jpg"){
                File::delete('images/setting'.$setting->logo);
            }

            $data['logo'] = $logo;
        }

        if($request->hasFile('favicon')){
            $favicon = $this->uploadGambar($request->favicon);

            if($setting->favicon !== "favicon_default.ico"){
                File::delete('images/setting'.$setting->favicon);
            }

            $data['favicon'] = $favicon;
        }
        
        // dd($data);
        $setting = SettingWebsite::get()->first();
        $setting->update($data);

        session()->flash('success', "Data has been updated!!");

        //redirect user
        return redirect()->back();
    }

    public function uploadGambar($gambar)
    {

        $gambar->move(public_path('images/setting'), $gambar->getClientOriginalName());

        return $gambar->getClientOriginalName();
    }
}
