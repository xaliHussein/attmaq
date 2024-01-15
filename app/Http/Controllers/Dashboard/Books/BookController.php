<?php

namespace App\Http\Controllers\Dashboard\Books;

use App\Http\Controllers\Controller;
use App\Models\Quran;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Quran::all();
        return view('admin.books.index',compact('books'));
    }
    public function create(){
        return view('admin.books.create');
    }
    public function store(Request $request){

        $validated = $request->validate([
            "name" => "required|unique:qurans"
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/books'), $fileName);
            $validated["image"] = '/images/books/' . $fileName;
        }

        if($request->hasFile('content')){
            $path = $request->file('content')->store('temp');
            $file = $request->file('content');
            $fileName = $file->getClientOriginalName();
            $book = $file->move(public_path('files/books'), $fileName);
            $validated["file"] = '/files/books/' . $fileName ;
        }

        Quran::create([
            "name" => $validated['name'],
            "image" => $validated['image'],
            "contentpath" => $validated['file']
        ]);

        return redirect()->route('books.index');
    }
    public function destroy($quran){
        Quran::findOrFail($quran)->delete();
        return redirect()->route('books.index');
    }

    public function edit($id){
        $quran = Quran::findOrFail($id);
        return view('admin.books.edit',compact('quran'));
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            "name" => "required|unique:qurans,id"
        ]);


        $quran = Quran::findOrFail($id);
        if($request->hasFile('image')){
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $img = $file->move(public_path('images/books'), $fileName);
            $validated["image"] = '/images/books/' . $fileName;
        }
        if($request->hasFile('content')){
            $path = $request->file('content')->store('temp');
            $file = $request->file('content');
            $fileName = $file->getClientOriginalName();
            $book = $file->move(public_path('files/books'), $fileName);
            $validated["contentpath"] = '/files/books/' . $fileName ;
        }

        $quran->update($validated);
        return redirect()->route('books.index');

    }


}
