<?php

namespace App\Http\Controllers\Dashboard\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|unique:banners',
            'image' => 'required',
            'value' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/news'), $fileName);
            $validatedData["image"] = '/images/news/' . $fileName;
        }

        $banner = Banner::create([
            'title' => $validatedData['title'],
            'type' => 'link',
            'image' => $validatedData['image'],
            'value' => $validatedData['value']
        ]);

        return redirect()->route('admin.banner.index');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->route('admin.banner.index');
    }

}
