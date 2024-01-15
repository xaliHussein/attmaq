<?php

namespace App\Http\Controllers\Dashboard\WebsiteSettings;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $settings = WebsiteSettings::all();
        return view('admin.website-settings.index',compact('settings'));
    }

    public function create(){
        return view('admin.website-settings.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        if($request->hasFile('value')){
            $path = $request->file('value')->store('temp');
            $file = $request->file('value');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/settings_images'), $fileName);
            $imagePath["image"] = '/images/settings_images/' . $fileName;

            WebsiteSettings::create([
                'key' => $request->key,
                'type' => 'image',
                'value' => $imagePath,
            ]);
        } else {
            $settings =  WebsiteSettings::create($request->all());
        }

        return redirect()->route('admin.website-settings.index')->with('success','Settings created successfully');
    }

    public function destroy($id){
        $settings = WebsiteSettings::find($id);
        $settings->delete();
        return redirect()->route('admin.website-settings.index')->with('success','Settings deleted successfully');
    }

    public function edit($id){
        $settings = WebsiteSettings::find($id);
        return view('admin.website-settings.edit',compact('settings'));
    }
    public function update(Request $request,$id){
        $validated = $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);
        $settings = WebsiteSettings::find($id);


        if($request->hasFile('value')){
            $path = $request->file('value')->store('temp');
            $file = $request->file('value');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/settings_images'), $fileName);
            $imagePath["image"] = '/images/settings_images/' . $fileName;

            $settings->update([
                'key' => $request->key,
                'type' => 'image',
                'value' => $imagePath,
            ]);
        } else {
            $settings->update($request->all());
        }


        return redirect()->route('admin.website-settings.index')->with('success','Settings updated successfully');
    }


}
