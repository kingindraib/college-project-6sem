<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::orderBy('id','DESC')->get();
        return view('admin.page.index', compact('page'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'content' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        if($request->hasFile('image') && $request->file('image')->isValid() == true){
        $data['image'] = Page::uploadFile($data['image']);
        }
        Page::create($data);
        return redirect()->route('page.index')->with('success_message', 'Page created successfully.');
    }

    public function edit($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.page.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'content' => 'required',
        ]);
        $page = Page::findOrFail($id);
        $data = $request->all();
        // $data['slug'] = Str::slug($request->title);
        if($request->hasFile('image') && $request->file('image')->isValid() == true){
            Page::deleteFile($page->image);
        $data['image'] = Page::uploadFile($data['image']);
        }
        $page->update($data);
        return redirect()->route('page.index')->with('success_message', 'Page updated successfully.');
    }

    public function delete($id)
    {
        // dd("hello");
        $page = Page::findOrFail($id);
        Page::deleteFile($page->image);
        $page->delete();
        return redirect()->route('page.index')->with('success_message', 'Page deleted successfully.');
    
    }
        
}
