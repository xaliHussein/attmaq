<?php

namespace App\Http\Controllers\Dashboard\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreFormRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }
    public function create(){
        return view('admin.services.create');
    }

    public  function store(ServiceStoreFormRequest $request){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/Services'), $fileName);
            $validated["image"] = '/images/Services/' . $fileName;
        }

        Service::create($validated);
        return redirect()->route('admin.service.index')->with('success','Service created successfully');
    }

    public function edit($id){
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $validatedData = $request->validate([
            'title' => ['required', 'unique:services,title,'.$service->id, 'max:255'],
            'image' => ['mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/Services'), $fileName);
            $validatedData["image"] = '/images/Services/' . $fileName;
        }

        $service->update($validatedData);
        return redirect()->route('admin.service.index');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.service.index');
    }
}
